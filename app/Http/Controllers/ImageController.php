<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\isEmpty;

class ImageController extends Controller
{

    /**
     * Display the specified resource.
     */
    public function show(string $id): void
    {
        User::query()->select('avatar')->where('id', $id)->first();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ImageRequest $request)
    {

        $id = Auth::id();

        //$this->destroy($id);

     //   $filename = Storage::putFile('avatars', $request->file('avatar'));
        $filename = $request->file('avatar')->store('avatars');

        User::query()
            ->where('id', $id)
            ->update(['avatar' => $filename]);

        $this->update_auth($filename);

       // return view('layouts.profile', [
       //     'name' => Auth::user()->name,
       //     'email' => Auth::user()->email,
       //     'avatar' => Auth::user()->avatar,
       //     'save'=>true]);
        return redirect()->route('profile');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        $id = Auth::id();
        $image = User::query()
            ->select('avatar')
            ->where('id', '=', $id)
            ->first();

        if (($image->avatar)!= null) {
            Storage::delete($image->avatar);
        }

        User::query()
            ->where('id', $id)
            ->update(['avatar' => null]);

        $this->update_auth(null);

        return redirect()->route('profile');
    }

    private function update_auth($image): void
    {
        Auth::user()->update([
            'avatar' => $image,
        ]);
    }
}
