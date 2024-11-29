<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = ['categorie_id','libelle','image','prix','quantite'];

   public function categorie()
   {
    return $this->belongsTo(Categorie::class);
   }

 public function commandes()
  {
     return $this->belongsToMany(Commande::class)->withPivot('quantite','prix');
  }
}
