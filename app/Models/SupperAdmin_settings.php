<?php

                namespace App\Models;
                
                use Illuminate\Database\Eloquent\Factories\HasFactory;
                use Illuminate\Database\Eloquent\Model;
                
                class SupperAdmin_settings extends Model
                {
                    use HasFactory;
                
                    protected $table = "supperAdmin_settings";
                
                    protected $guarded = [];
                
                    protected $casts = [];
                
                }