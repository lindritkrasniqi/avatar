<?php

namespace lindritkrasniqi\Avatar\Contracts;

use Illuminate\Http\UploadedFile;

interface Avatar
{
    /**
     * Set the user.
     *
     * @param  \App\Models\User $user
     * @return self
     */
    public function of($user): self;

    /**
     * Store new avatar.
     *
     * @param  \Illuminate\Http\UploadedFile $file
     * @return void
     */
    public function store(UploadedFile $file);

    /**
     * Update avatar.
     *
     * @param  \Illuminate\Http\UploadedFile $file
     * @return void
     */
    public function update(UploadedFile $file);

    /**
     * Destroy the avatar.
     *
     * @return void
     */
    public function destroy();

    /**
     * Unlink the given avatar.
     *
     * @param  string  $path
     * @return boolean
     */
    public function delete(string $path): bool;
}
