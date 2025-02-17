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
    // This function is responsible for creating the 'orders' table in the database.
    // The Schema::create method is used to define the table structure.

    Schema::create('orders', function (Blueprint $table) {
        // Creates an auto-incrementing primary key 'id' for the 'orders' table.
        $table->id();

        // Defines a foreign key 'user_id' referencing the 'id' in the 'users' table.
        // If a user is deleted, all related orders will also be deleted (cascade on delete).
        $table->foreignId('user_id')->constrained()->onDelete('cascade');

        // Defines a foreign key 'product_id' referencing the 'id' in the 'products' table.
        // When a product is deleted, all related orders will be deleted (cascade on delete).
        $table->foreignId('product_id')->constrained()->onDelete('cascade');

        // Adds an integer column 'qty' for storing the quantity of the product ordered.
        $table->integer('qty');

        // Adds an integer column 'price' for storing the price of the product ordered.
        $table->integer('price');

        // Adds a string column 'status' to store the order status, with a default value of 'Pending'.
        $table->string('status')->default('Pending');

        // Adds a string column 'payment_method' to store the method of payment used for the order.
        $table->string('payment_method');

        // Adds a string column 'name' to store the customer's name.
        $table->string('name');

        // Adds a string column 'phone' to store the customer's phone number.
        $table->string('phone');

        // Adds a string column 'address' to store the customer's address.
        $table->string(column: 'address');

        // Adds 'created_at' and 'updated_at' timestamp columns to track when the order is created and updated.
        $table->timestamps();
    });
}

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    // This function is responsible for rolling back (deleting) the 'orders' table if the migration is reversed.
    // The Schema::dropIfExists method ensures that the 'orders' table is only dropped if it already exists.
    Schema::dropIfExists('orders');
}

};
