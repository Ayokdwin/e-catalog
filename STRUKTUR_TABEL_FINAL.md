# 📊 Struktur Tabel Database Kangtopi - Implementasi Lengkap

## ✅ Yang Sudah Dikerjakan

### 🗄️ Database Migrations (6 file baru)

#### 1. **quantity_tiers** - Paket Berdasarkan Jumlah Order
```
Menggantikan: sizes table
Struktur:
- id, label, min_qty, max_qty, price_per_unit, is_negotiable, timestamps

Data Seeder:
- Starter:  24-49 pcs   @ Rp 65.000/pcs (tidak nego)
- Medium:   50-99 pcs   @ Rp 60.000/pcs (tidak nego) - FEATURED
- Bulk:     100+ pcs    @ Nego (tidak ada harga tetap)
```

#### 2. **tier_benefits** - Benefit Per Paket
```
Struktur:
- id, tier_id (FK), benefit, timestamps

Contoh:
- Tier 1 (Starter):  Free konsultasi, Free mockup, Label sendiri, Free bordir 2D, Subsidi ongkir
- Tier 2 (Medium):   + Free label satin, Bordir 2D & 3D, Sablon & patch
- Tier 3 (Bulk):     + Harga spesial
```

#### 3. **product_materials** - Relasi Many-to-Many
```
Struktur:
- id, product_id (FK), material_id (FK), timestamps
- Unique constraint: (product_id, material_id)

Menggantikan: product_variants relationship
Gunakan untuk: Menentukan material apa yang tersedia per produk
```

#### 4. **materials** - Tambah Image Column
```
Perubahan:
- Menambah: image (nullable string)
- Tetap: name, price_per_unit
```

#### 5. **estimation_factors** - Tambah Type Column
```
Perubahan:
- Menambah: type (string) - kategori: bordir, sablon, patch
- Tetap: name, extra_cost

Data Seeder:
- Bordir 2D       | bordir  | Rp 10.000
- Bordir 3D       | bordir  | Rp 15.000
- Bordir Towel    | bordir  | Rp 20.000
- Sablon DTF      | sablon  | Rp 8.000
- Sablon Plastisol| sablon  | Rp 8.000
- Patch           | patch   | Rp 12.000
```

#### 6. **products** - Tambah Base Price Column
```
Perubahan:
- Menambah: base_price (default: Rp 50.000)
- Digunakan: Dalam kalkulasi estimasi harga
```

---

### 🏗️ Model Classes (5 file)

#### Updated Models:
- **Product.php**
  - ✅ Tambah fillable: base_price
  - ✅ Tambah relationship: `materials()` - belongsToMany via product_materials
  - ✅ Tetap: category(), variants()

- **Material.php**
  - ✅ Tambah fillable: image
  - ✅ Tambah relationship: `products()` - belongsToMany via product_materials

- **EstimationFactor.php**
  - ✅ Tambah fillable: type

#### New Models:
- **QuantityTier.php**
  - ✅ Fillable: label, min_qty, max_qty, price_per_unit, is_negotiable
  - ✅ Relationship: `benefits()` - hasMany TierBenefit

- **TierBenefit.php**
  - ✅ Fillable: tier_id, benefit
  - ✅ Relationship: `tier()` - belongsTo QuantityTier

---

### 🎮 Controller Updated

**LandingPageController.php**
- ✅ Removed: Product::variants, ProductVariant, Size
- ✅ Tambah: QuantityTier dengan eager load benefits
- ✅ Ubah: Products dengan eager load materials (bukan variants)
- ✅ Pass ke view: quantity_tiers (bukan sizes)

---

### 🎨 View Updated

**welcome.blade.php**
- ✅ Paket section: Gunakan `$quantity_tiers` loop
  - Tampil: label, min_qty-max_qty pcs, price_per_unit atau "Nego"
  - Marked: Medium tier (id=2) sebagai featured/terpopuler
  - Benefits: Loop dari tier->benefits
  
- ✅ Estimasi section: Gunakan `base_price` dari produk
  - Produk select: data-price dari base_price (bukan variants)
  - Material select: tetap dari price_per_unit
  - Calculation: (base_price + material + extras) * qty

---

### 📋 Seeder Updated

**DatabaseSeeder.php**
- ✅ 7 Categories sesuai spesifikasi
- ✅ 5 Sample Products dengan base_price
- ✅ 6 Sample Materials dengan sample prices
- ✅ 3 Quantity Tiers dengan benefits lengkap
- ✅ 6 Estimation Factors dengan type kategori
- ✅ Product-Material relationships di buat via attach()

---

## 📝 Relasi Antar Tabel (ER Diagram ASCII)

```
                    categories
                        |
                        | 1:N
                        |
                    products ─────────────────┐
                    (base_price)              |
                        |                     |
                        |                   N:M
                        |                     |
                        |              product_materials
                        |                     |
                        |                   N:M
                        |                     |
                        └───────────────────── └── materials
                                              (price_per_unit)

    quantity_tiers ──── 1:N ──── tier_benefits

    estimation_factors (standalone)
    (name, type, extra_cost)
```

---

## 🚀 Langkah Migrasi Selanjutnya

### 1. Jalankan Migrations
```bash
php artisan migrate
```

### 2. Jalankan Seeder
```bash
php artisan db:seed
```

### 3. Test di Browser
```
http://localhost:8001/
```

### 4. Verify Data
- Paket section: Harus menampilkan 3 tier (Starter, Medium, Bulk)
- Estimasi: Produk dropdown harus terisi dengan 5 produk
- Materials: Harus terisi dengan 6 material

---

## 📌 Formula Estimasi Harga

```javascript
Total = (product.base_price + material.price_per_unit + selected_extras_sum) × qty
```

**Contoh:**
- Produk: Baseball Cap (Rp 50.000)
- Material: Twill 20/10 (Rp 5.000)
- Extra: Bordir 2D (Rp 10.000)
- Qty: 50 pcs
- **Total** = (50.000 + 5.000 + 10.000) × 50 = **Rp 3.250.000**

---

## ⚠️ Catatan Penting

1. **Backward Compatibility**: Jika ada data lama di `sizes` dan `product_variants`, perlu dihapus dulu atau migration tambahan untuk cleanup
2. **Price Format**: Semua harga dalam IDR (Rupiah) tanpa simbol
3. **Tier Negotiable**: Bulk tier bersifat negotiate (price_per_unit = NULL)
4. **Free Sizing**: Tidak ada lagi size variants - semua produk free size
5. **Material per Produk**: Setiap product bisa punya multiple materials via junction table

---

## 🔗 File-File Terkait

**Migrations:**
- `2026_05_10_000001_create_quantity_tiers_table.php`
- `2026_05_10_000002_create_tier_benefits_table.php`
- `2026_05_10_000003_create_product_materials_table.php`
- `2026_05_10_000004_add_image_to_materials_table.php`
- `2026_05_10_000005_add_type_to_estimation_factors_table.php`
- `2026_05_10_000006_add_base_price_to_products_table.php`

**Models:**
- `app/Models/Product.php`
- `app/Models/Material.php`
- `app/Models/EstimationFactor.php`
- `app/Models/QuantityTier.php` (NEW)
- `app/Models/TierBenefit.php` (NEW)

**Controllers:**
- `app/Http/Controllers/LandingPageController.php`

**Views:**
- `resources/views/welcome.blade.php`

**Seeders:**
- `database/seeders/DatabaseSeeder.php`
