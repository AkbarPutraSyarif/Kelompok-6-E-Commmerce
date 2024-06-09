<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
<<<<<<< HEAD
            $table->string('nama');
            $table->integer('harga');
            $table->string('image');
            $table->text('description');
            $table->integer('stock');
            $table->date('expired_date');


=======
            $table->string('name');
            $table->integer('harga');
            $table->string('image');
>>>>>>> 80a0e84 (Membuat Beranda dan Database Product)
=======
            $table->string('nama');
            $table->integer('harga');
            $table->string('image');
            $table->integer('stok');
            $table->text('deskripsi');
>>>>>>> 5f9760f (Nambahin checkout product dan layout product)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
<<<<<<< HEAD
<<<<<<< HEAD
};
=======
};
>>>>>>> 80a0e84 (Membuat Beranda dan Database Product)
=======
};
>>>>>>> 5f9760f (Nambahin checkout product dan layout product)
