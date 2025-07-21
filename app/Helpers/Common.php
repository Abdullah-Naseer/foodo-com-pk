<?php

namespace App\Helpers;

class Common

{
    public static function get_changes($old, $new)
    {
        $changes = [];

        foreach ($new as $key => $val) {
            if ($old->isFillable($key)) {
                $oldValue = $old->getAttribute($key);

                if ($oldValue !== $val) {
                    $changes[$key] = [
                        'old' => $oldValue,
                        'new' => $val,
                    ];
                }
            } else {
                $changes[$key] = [
                    'old' => null,
                    'new' => $val,
                ];
            }
        }

        $excludedKeys = ['updated_by', 'updated_at', '_token', '_method'];
        foreach ($excludedKeys as $excludedKey) {
            unset($changes[$excludedKey]);
        }

        return $changes;
    }
    
    public static function uploadMedia($file, $path)
    {
        $fileName = time() . '.' . $file->extension();
        $file->move(public_path($path), $fileName);
        return asset("public/" . $path . '/' . $fileName);
    }

}


// function get_changes($old, $new)
// {
//     $changes = [];

//     foreach ($new as $key => $val) {
//         // Check if the key exists in the old data array
//         if (array_key_exists($key, $old)) {
//             $oldValue = $old[$key];

//             if ($oldValue !== $val) {
//                 $changes[$key] = [
//                     'old' => $oldValue,
//                     'new' => $val,
//                 ];
//             }
//         } else {
//             // Handle the case where the key doesn't exist in the old array
//             $changes[$key] = [
//                 'old' => null,
//                 'new' => $val,
//             ];
//         }
//     }

//     // Exclude specific keys from tracking
//     $excludedKeys = ['updated_by', 'updated_at', '_token', '_method'];
//     foreach ($excludedKeys as $excludedKey) {
//         unset($changes[$excludedKey]);
//     }

//     return $changes;
// }
