<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Material;
use App\Models\QuantityTier;
use App\Models\TierBenefit;
use App\Models\EstimationFactor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create test user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Seed Categories
        $categories = [
            ['name' => 'Baseball', 'slug' => 'baseball'],
            ['name' => 'Trucker', 'slug' => 'trucker'],
            ['name' => 'Snapback', 'slug' => 'snapback'],
            ['name' => 'Bucket', 'slug' => 'bucket'],
            ['name' => 'Topi Rimba', 'slug' => 'topi-rimba'],
            ['name' => 'Five Panel', 'slug' => 'five-panel'],
            ['name' => 'Rope Hat', 'slug' => 'rope-hat'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        // Seed Products
        $products = [
            ['category_id' => 1, 'name' => 'Baseball Cap Classic', 'description' => 'Topi baseball klasik dengan struktur kokoh', 'image' => null, 'base_price' => 50000, 'is_active' => true],
            ['category_id' => 1, 'name' => 'Baseball Cap Sport', 'description' => 'Topi baseball untuk olahraga', 'image' => null, 'base_price' => 52000, 'is_active' => true],
            ['category_id' => 2, 'name' => 'Trucker Mesh', 'description' => 'Topi trucker dengan mesh belakang', 'image' => null, 'base_price' => 55000, 'is_active' => true],
            ['category_id' => 3, 'name' => 'Snapback Original', 'description' => 'Topi snapback original dengan kualitas premium', 'image' => null, 'base_price' => 48000, 'is_active' => true],
            ['category_id' => 4, 'name' => 'Bucket Hat Classic', 'description' => 'Topi bucket minimalis dan nyaman', 'image' => null, 'base_price' => 45000, 'is_active' => true],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }

        // Seed Materials
        $materials = [
            ['name' => 'Twill 20/10', 'image' => null, 'price_per_unit' => 5000],
            ['name' => 'American Drill', 'image' => null, 'price_per_unit' => 6000],
            ['name' => 'Corduroy', 'image' => null, 'price_per_unit' => 7000],
            ['name' => 'Rapel 7S', 'image' => null, 'price_per_unit' => 5500],
            ['name' => 'Taslan', 'image' => null, 'price_per_unit' => 6500],
            ['name' => 'Canvas', 'image' => null, 'price_per_unit' => 5200],
        ];

        foreach ($materials as $material) {
            Material::create($material);
        }

        // Seed product-material relationships
        // Baseball cap dapat menggunakan semua material
        $product1 = Product::find(1);
        $product1->materials()->attach([1, 2, 3, 4, 5, 6]);

        // Trucker cap
        $product3 = Product::find(3);
        $product3->materials()->attach([1, 2, 3]);

        // Seed Quantity Tiers
        $tiers = [
            ['label' => 'Starter', 'min_qty' => 24, 'max_qty' => 49, 'price_per_unit' => 65000, 'is_negotiable' => false],
            ['label' => 'Medium', 'min_qty' => 50, 'max_qty' => 99, 'price_per_unit' => 60000, 'is_negotiable' => false],
            ['label' => 'Bulk', 'min_qty' => 100, 'max_qty' => null, 'price_per_unit' => null, 'is_negotiable' => true],
        ];

        foreach ($tiers as $tier) {
            QuantityTier::create($tier);
        }

        // Seed Tier Benefits
        $tierBenefits = [
            // Starter tier (1)
            ['tier_id' => 1, 'benefit' => 'Free konsultasi'],
            ['tier_id' => 1, 'benefit' => 'Free mockup'],
            ['tier_id' => 1, 'benefit' => 'Label sendiri'],
            ['tier_id' => 1, 'benefit' => 'Free bordir 2D'],
            ['tier_id' => 1, 'benefit' => 'Subsidi ongkir'],
            
            // Medium tier (2)
            ['tier_id' => 2, 'benefit' => 'Free konsultasi'],
            ['tier_id' => 2, 'benefit' => 'Free mockup'],
            ['tier_id' => 2, 'benefit' => 'Free label satin'],
            ['tier_id' => 2, 'benefit' => 'Bordir 2D & 3D'],
            ['tier_id' => 2, 'benefit' => 'Sablon & patch'],
            ['tier_id' => 2, 'benefit' => 'Subsidi ongkir'],
            
            // Bulk tier (3)
            ['tier_id' => 3, 'benefit' => 'Harga spesial'],
            ['tier_id' => 3, 'benefit' => 'Free konsultasi'],
            ['tier_id' => 3, 'benefit' => 'Free mockup'],
            ['tier_id' => 3, 'benefit' => 'Free label satin'],
            ['tier_id' => 3, 'benefit' => 'Bordir 2D & 3D'],
        ];

        foreach ($tierBenefits as $benefit) {
            TierBenefit::create($benefit);
        }

        // Seed Estimation Factors
        $factors = [
            ['name' => 'Bordir 2D', 'type' => 'bordir', 'extra_cost' => 10000],
            ['name' => 'Bordir 3D', 'type' => 'bordir', 'extra_cost' => 15000],
            ['name' => 'Bordir Towel', 'type' => 'bordir', 'extra_cost' => 20000],
            ['name' => 'Sablon DTF', 'type' => 'sablon', 'extra_cost' => 8000],
            ['name' => 'Sablon Plastisol', 'type' => 'sablon', 'extra_cost' => 8000],
            ['name' => 'Patch', 'type' => 'patch', 'extra_cost' => 12000],
        ];

        foreach ($factors as $factor) {
            EstimationFactor::create($factor);
        }
    }
}

