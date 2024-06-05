<?php

use App\Models\Bay;
use App\Models\Rack;
use App\Models\User;
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
        Schema::create('bays', function (Blueprint $table) {
            $table->id();
            $table->char('bay_name', 4);
            $table->timestamps();
        });

        Schema::create('racks', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Bay::class);
            $table->integer('rack_id');
            $table->foreignIdFor(User::class)->nullable();
            $table->char('rack_name', 150)->nullable();
            $table->char('rack_color', 15)->nullable();
            $table->date('end_date')->nullable();
            $table->timestamps();
        });

        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->char('title', 255);
            $table->char('description', 255);
            $table->integer('rack_qty');
            $table->float('price');
            $table->float('discount');
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Rack::class);
            $table->foreignIdFor(Bay::class);
            $table->float('price');
            $table->integer('discount');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
        });

        Schema::create('status', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Rack::class);
            $table->foreignIdFor(Bay::class);
            $table->date('end_date');
            $table->text('info');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bays');
        Schema::dropIfExists('racks');
        Schema::dropIfExists('offers');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('status');
    }
};
