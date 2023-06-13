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
        Schema::create('profits', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->date('date');
            $table->decimal('sales_revenue');
            $table->decimal('purchases');
            $table->decimal('other_direct_costs')->default(0.00);
            $table->decimal('salaries_and_wages');
            $table->decimal('rent');
            $table->decimal('liabilities');
            $table->decimal('capital_expenses');
            $table->decimal('loan_payment');
            $table->decimal('taxes');
            $table->decimal('insuarance_expenses');
            $table->decimal('advertising_expenses');
            $table->decimal('other_expenses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profits');
    }
};
