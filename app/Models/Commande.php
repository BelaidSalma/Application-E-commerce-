<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    
    public function produits()
    {
        return $this->belongsToMany(Produit::class)->withPivot('quantite','prix');
    }
    use HasFactory;
}
