<?php

namespace App\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Masmerise\Toaster\Toaster;

class EditNewsComponent extends Component
{
    use WithFileUploads;
    public $idNews, $publishdate, $titleID, $titleEN, $descriptionID, $descriptionEN, $contentID, $contentEN, $photo, $uphoto, $isactive;

    public function mount($id){
        $data = DB::table('news')->where('id', $id)->first();
        $this->idNews = $id;
        $this->publishdate = $data->publishdate;
        $this->titleID = $data->titleID;
        $this->titleEN = $data->titleEN;
        $this->descriptionEN = $data->descriptionEN;
        $this->descriptionID = $data->descriptionID;
        $this->contentID = $data->contentID;
        $this->contentEN = $data->contentEN;
        $this->isactive = $data->status;
        $this->uphoto = $data->img;


    }

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
        $extension = pathinfo($photo->getFilename(), PATHINFO_EXTENSION);
        if (!in_array($extension, ['png', 'jpeg', 'bmp', 'gif','jpg','webp','mp4', 'avi', '3gp', 'mov', 'm4a'])) {
           $this->reset('photo');
           Toaster::error('File not supported!');
        }

    }

    public function storePosts(){
        if($this->manualValidation()){
            if(!$this->photo){
                $name = $this->uphoto;
            }else{
                    $name = $this->uploadImage();
                    if ($name === null) {
                        return;
                    }
                    Storage::delete('public/files/photos/'.$this->uphoto);
                    Storage::delete('public/files/photos/thumbnail/'.$this->uphoto);


            }
            DB::table('news')
                    ->where('id', $this->idNews)
                    ->update([
                        'publishdate' => $this->publishdate,
                        'titleID' => $this->titleID,
                        'titleEN' => $this->titleEN,
                        'descriptionID' => $this->descriptionID,
                        'descriptionEN' => $this->descriptionEN,
                        'contentID' => $this->contentID,
                        'contentEN' => $this->contentEN,
                        'img' => $name,
                        'status' => $this->isactive,
                        'updated_at' => Carbon::now('Asia/Jakarta')
                    ]);

            Toaster::success('Succesfully update news');
        }

    }
    public function render()
    {
        return view('livewire.edit-news-component');
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
        }
        return true;
    }
}
