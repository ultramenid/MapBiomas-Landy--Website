@props([
    'field', // Livewire property to sync with
    'label' => null,
    'height' => 420,
])

@php
$id = 'richtext-' . $field;
@endphp

<div>
    @if ($label)
        <span class="mb-1.5 block text-xs font-medium text-ink">{{ $label }}</span>
    @endif
    <div wire:ignore
         x-init="const dark = document.documentElement.classList.contains('dark');
        tinymce.init({
            selector: '#{{ $id }}',
            height: {{ $height }},
            promotion: false,
            branding: false,
            license_key: 'gpl',
            relative_urls: false,
            remove_script_host: false,
            convert_urls: true,
            highlight_on_focus: false,
            skin: dark ? 'oxide-dark' : 'oxide',
            font_css: 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap',
            content_style: dark
                ? 'body { background-color: #151515; color: #ededed; font-family: \'Open Sans\', ui-sans-serif, system-ui, sans-serif; font-size: 16px; } a { color: #E17367; } img, iframe { max-width: 100%; }'
                : 'body { background-color: #ffffff; color: #171717; font-family: \'Open Sans\', ui-sans-serif, system-ui, sans-serif; font-size: 16px; } a { color: #E17367; } img, iframe { max-width: 100%; }',
            plugins: 'lists advlist autolink link image charmap anchor pagebreak searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking table emoticons help',
            toolbar: 'undo redo | bold italic underline forecolor backcolor | link image | bullist numlist alignleft aligncenter alignright alignjustify outdent indent | removeformat | fullscreen help',
            menubar: 'file edit view insert format tools table help',
            images_upload_url: '/cms/tinymce-upload',
            images_upload_handler: function (blobInfo, progress) {
                return new Promise((resolve, reject) => {
                    const xhr = new XMLHttpRequest();
                    xhr.withCredentials = false;
                    xhr.open('POST', '/cms/tinymce-upload');

                    const token = document.querySelector('meta[name=\"csrf-token\"]')?.getAttribute('content');
                    if (token) {
                        xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }

                    xhr.upload.onprogress = (e) => {
                        progress(e.loaded / e.total * 100);
                    };

                    xhr.onload = () => {
                        if (xhr.status === 403 || xhr.status === 401 || xhr.status === 419) {
                            reject({ message: 'Session or CSRF token expired. Code: ' + xhr.status, remove: true });
                            return;
                        }
                        if (xhr.status < 200 || xhr.status >= 300) {
                            reject('Upload failed with status ' + xhr.status);
                            return;
                        }
                        const json = JSON.parse(xhr.responseText);
                        if (!json || typeof json.location !== 'string') {
                            reject(json?.error || 'Invalid server response');
                            return;
                        }
                        resolve(json.location);
                    };

                    xhr.onerror = () => {
                        reject('Image upload failed due to network error.');
                    };

                    const formData = new FormData();
                    formData.append('file', blobInfo.blob(), blobInfo.filename());
                    xhr.send(formData);
                });
            },
            file_picker_callback: function (cb, value, meta) {
                const input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', meta.filetype === 'image'
                    ? 'image/png,image/jpeg,image/gif,image/webp'
                    : '.pdf,.doc,.docx,.xls,.xlsx');
                input.onchange = function () {
                    const file = this.files[0];
                    if (!file) return;

                    const formData = new FormData();
                    formData.append('file', file);

                    const token = document.querySelector('meta[name=\"csrf-token\"]')?.getAttribute('content');

                    fetch('/cms/tinymce-upload', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': token || ''
                        },
                        body: formData
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Upload failed with status ' + response.status);
                        }
                        return response.json();
                    })
                    .then(result => {
                        if (result.location) {
                            cb(result.location, { title: file.name, text: file.name });
                        } else {
                            alert(result.error || 'Upload failed');
                        }
                    })
                    .catch(err => {
                        alert('Upload failed: ' + err.message);
                    });
                };
                input.click();
            },
            setup: function(editor) {
                editor.on('change keyup', function(e) {
                    @this.set('{{ $field }}', editor.getContent());
                });
            }
        });">
        <textarea id="{{ $id }}" name="{{ $field }}" rows="12" style="visibility:hidden">{{ $slot }}</textarea>
    </div>
</div>
