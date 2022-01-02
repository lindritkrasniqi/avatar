<?php

namespace lindritkrasniqi\Avatar\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use lindritkrasniqi\Avatar\Contracts\Avatar as AvatarContract;
use Intervention\Image\Facades\Image;

class Avatar implements AvatarContract
{
    /**
     * The disk.
     *
     * @var string
     */
    private $disk;

    /**
     * The directory.
     *
     * @var string
     */
    private $directory;

    /**
     * The user.
     *
     * @var \App\Models\User
     */
    private $user;

    /**
     * Avatar size.
     *
     * @var mixed
     */
    private $size;

    public function __construct()
    {
        $this->user = request()->user();

        $this->disk = config('avatar.disk', 'public');

        $this->directory = config('avatar.directory', 'avatars');

        $this->size = config('avatar.defaults.size', 150);
    }

    /**
     * Set the user property.
     *
     * @param  \App\Models\User $user
     * @return self
     */
    public function of($user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Store new avatar.
     *
     * @param  \Illuminate\Http\UploadedFile $file
     * @return void
     */
    public function store(UploadedFile $file)
    {
        $this->user->avatar = $this->user->avatar()->create($this->avatar($file));

        $this->storeAs($file, $this->user->getAvatarFileName());
    }

    /**
     * Update the current avatar.
     *
     * @param  \Illuminate\Http\UploadedFile $file
     * @return void
     */
    public function update(UploadedFile $file)
    {
        $this->delete($this->user->getAvatarFileName());

        $this->user->avatar->update($this->avatar($file));

        $this->storeAs($file, $this->user->getAvatarFileName());
    }

    /**
     * Destroy the current avatar.
     *
     * @return void
     */
    public function destroy()
    {
        $this->delete($this->user->getAvatarFileName());

        $this->user->avatar->delete();
    }

    /**
     * Store the avatar file and make it fit.
     *
     * @param  \Illuminate\Http\UploadedFile $file
     * @param  string $name
     * @return void
     */
    private function storeAs(UploadedFile $file, string $name): void
    {
        $file->storeAs($this->directory, $name, $this->disk);

        $this->makeAvatarFit($name);
    }

    /**
     * Unlink from disk the given avatar file name.
     *
     * @param  string  $avatar
     * @return boolean
     */
    public function delete(string $avatar): bool
    {
        return Storage::disk($this->disk)->delete($this->directory . '/' . $avatar);
    }

    /**
     * Get avatar properties.
     *
     * @param  \Illuminate\Http\UploadedFile $file
     * @return array
     */
    private function avatar(UploadedFile $file)
    {
        return [
            'name' => rand(10000, 9999999) . '_' . now()->timestamp,
            'extension' => $file->getClientOriginalExtension(),
            'size' => $file->getSize()
        ];
    }

    /**
     * Make the current avatar fit.
     *
     * @param  string $avatar
     * @return void
     */
    private function makeAvatarFit(string $avatar)
    {
        Image::make(storage_path("app/{$this->disk}/{$this->directory}/{$avatar}"))->fit($this->size, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save();
    }
}
