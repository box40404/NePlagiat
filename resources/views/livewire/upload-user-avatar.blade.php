<div>
    <form action="" enctype="multipart/form-data" method="put">
        <label for="img-input" class="change-avatar-input">
            <img wire:loading.remove src="{{$user->avatar}}" alt="User Avatar" class="avatar">
            <img wire:loading wire:target="image" class="loading" src="/storage/other/loading.gif" >
        </label>
        <input name="img" id="img-input" type="file" style="display: none;" wire:model="image" >
    </form>
</div>