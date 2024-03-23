<?php

namespace App\Livewire;

use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

use function Laravel\Prompts\error;

class UploadUserAvatar extends Component
{
    use WithFileUploads;

    #[Validate('image')]
    public $image;

    public $user;

    public function updated() 
    {
        $userId = $this->user->id;

        $path = $this->image->store("public/users/$userId/avatar");
        if(!$path){
            return error("омг фотокарточка сломала все");
        }
        
        $files = Storage::files("public/users/$userId/avatar");
        if(count($files) > 1){
            Storage::delete($files[0]);
        }

        $this->user->avatar = Storage::url($path);
        $this->user->save();       
    }

    public function render()
    {
        return view('livewire.upload-user-avatar');
    }
}
