<?php

namespace App\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Masmerise\Toaster\Toaster;
use Illuminate\Support\Str;

class AddNewsComponent extends Component
{
    use WithFileUploads;
    public $publishdate, $titleID, $titleEN, $descriptionID, $descriptionEN, $contentID, $contentEN, $category, $subcategory, $photo, $isactive=0;

    public function uploadImage(){
        $allowedMimes = [
            'image/png', 'image/jpeg', 'image/bmp', 'image/gif', 'image/webp',
            'video/mp4', 'video/x-msvideo', 'video/avi', 'video/3gpp', 'video/quicktime', 'audio/mp4', 'audio/x-m4a',
        ];
        if (!in_array(strtolower($this->photo->getClientOriginalExtension()), ['png', 'jpeg', 'bmp', 'gif','jpg','webp','mp4', 'avi', '3gp', 'mov', 'm4a'])
            || !in_array(strtolower($this->photo->getMimeType()), $allowedMimes)) {
            $this->reset('photo');
            Toaster::error('File not supported!');
            return null;
        }

        $file = $this->photo->store('public/files/photos');
        $foto = $this->photo->hashName();

        $manager = new ImageManager(new Driver());

        // https://image.intervention.io/v3/modifying/resizing
        $image = $manager->read('storage/files/photos/'.$foto)->cover(300, 150);
        $image->save('storage/files/photos/thumbnail/'.$foto);
        return $foto;
    }

    public function updatedPhoto($photo){
        $extension = $photo->getClientOriginalExtension();
        if (!in_array(strtolower($extension), ['png', 'jpeg', 'bmp', 'gif','jpg','webp','mp4', 'avi', '3gp', 'mov', 'm4a'])) {
           $this->reset('photo');
           Toaster::error('File not supported!');
        }

    }

    public function storePosts(){
        if($this->manualValidation()){
            $photo = $this->uploadImage();
            if ($photo === null) {
                return;
            }
            DB::table('news')->insert([
                'publishdate' => $this->publishdate,
                'titleID' => $this->titleID,
                'titleEN' => $this->titleEN,
                'category' => $this->category,
                'slug' => Str::slug($this->titleID,'-'),
                'descriptionID' => $this->descriptionID,
                'descriptionEN' => $this->descriptionEN,
                'contentID' => $this->contentID,
                'contentEN' => $this->contentEN,
                'img' => $photo,
                'status' => $this->isactive,
                'created_at' => Carbon::now('Asia/Jakarta')
            ]);

            redirect()->to('/cms/listnews');
            // $this->redirect('/cms/listnews', navigate: true);
        }
    }
    public function render()
    {
        return view('livewire.add-news-component');
    }
    public function manualValidation(){
        if(strlen($this->titleID) > 120){
            Toaster::error('Title Indonesia limit 120 character!');
            return;
        }elseif($this->titleID == '' ){
            Toaster::error('Title Indonesia is required!');
            return;
        }elseif(strlen($this->titleEN) > 120){
            Toaster::error('Title English limit 120 character!');
            return;
        }elseif($this->titleEN == '' ){
            Toaster::error('Title English is required!');
            return;
        }elseif($this->photo == '' ){
            Toaster::error('Image is required!');
            return;
        }elseif($this->descriptionID == '' ){
            Toaster::error('Description Indonesia is required!');
            return;
        }elseif(strlen($this->descriptionID) > 255 ){
            Toaster::error('Description Indonesia limit 255 character!');
            return;
        }elseif($this->descriptionEN == '' ){
            Toaster::error('Description English is required!');
            return;
        }elseif(strlen($this->descriptionEN) > 255 ){
            Toaster::error('Description English limit 255 character!');
            return;
        }elseif($this->contentID == '' ){
            Toaster::error('Content Indonesia is required!');
            return;
        }elseif($this->publishdate == '' ){
            Toaster::error('Publish date is required!');
            return;
        }elseif($this->category == '' ){
            Toaster::error('Category is required!');
            return;
        }
        return true;
    }
}
