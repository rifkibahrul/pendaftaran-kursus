<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $owner = User::create([
            'name' => 'Owner Demo',
            'occupation' => 'Owner',
            'email' => 'owner@example.com',
            'password' => bcrypt('123123'),
            'role' => 'owner',
        ]);

        $student = User::create([
            'name' => 'Siswa Demo',
            'occupation' => 'Siswa',
            'email' => 'student@example.com',
            'password' => bcrypt('123123'),
            'role' => 'student',
        ]);

        // Kategori 1: Programming
        $cat1 = Category::create(['name' => 'Programming', 'slug' => 'programming', 'icon' => 'fas fa-code']);

        // Kursus untuk kategori Programming
        Course::create([
            'owner_id' => $owner->id,
            'category_id' => $cat1->id,
            'name' => 'Pemrograman Web',
            'slug' => 'pemrograman-web',
            'description' => 'Belajar pemrograman web dari dasar hingga mahir dengan HTML, CSS, JavaScript, dan framework modern.',
        ]);

        Course::create([
            'owner_id' => $owner->id,
            'category_id' => $cat1->id,
            'name' => 'Python untuk Pemula',
            'slug' => 'python-untuk-pemula',
            'description' => 'Kursus Python lengkap untuk pemula yang ingin belajar programming dengan bahasa yang mudah dipahami.',
        ]);

        Course::create([
            'owner_id' => $owner->id,
            'category_id' => $cat1->id,
            'name' => 'Mobile App Development',
            'slug' => 'mobile-app-development',
            'description' => 'Belajar membuat aplikasi mobile untuk Android dan iOS menggunakan React Native dan Flutter.',
        ]);

        // Kategori 2: Design
        $cat2 = Category::create(['name' => 'Design', 'slug' => 'design', 'icon' => 'fas fa-paint-brush']);

        // Kursus untuk kategori Design
        Course::create([
            'owner_id' => $owner->id,
            'category_id' => $cat2->id,
            'name' => 'UI/UX Design Fundamentals',
            'slug' => 'ui-ux-design-fundamentals',
            'description' => 'Pelajari prinsip-prinsip dasar desain UI/UX untuk membuat aplikasi yang user-friendly dan menarik.',
        ]);

        Course::create([
            'owner_id' => $owner->id,
            'category_id' => $cat2->id,
            'name' => 'Adobe Photoshop Mastery',
            'slug' => 'adobe-photoshop-mastery',
            'description' => 'Kuasai Adobe Photoshop dari dasar hingga teknik advanced untuk editing gambar dan desain grafis.',
        ]);

        Course::create([
            'owner_id' => $owner->id,
            'category_id' => $cat2->id,
            'name' => 'Graphic Design Principles',
            'slug' => 'graphic-design-principles',
            'description' => 'Pahami teori warna, tipografi, layout, dan prinsip desain grafis untuk karya yang profesional.',
        ]);

        // Kategori 3: Business
        $cat3 = Category::create(['name' => 'Business', 'slug' => 'business', 'icon' => 'fas fa-chart-line']);

        // Kursus untuk kategori Business
        Course::create([
            'owner_id' => $owner->id,
            'category_id' => $cat3->id,
            'name' => 'Digital Marketing Strategy',
            'slug' => 'digital-marketing-strategy',
            'description' => 'Pelajari strategi digital marketing efektif untuk meningkatkan penjualan dan brand awareness.',
        ]);

        Course::create([
            'owner_id' => $owner->id,
            'category_id' => $cat3->id,
            'name' => 'Financial Management',
            'slug' => 'financial-management',
            'description' => 'Kursus manajemen keuangan untuk pengusaha dan profesional yang ingin mengoptimalkan keuangan bisnis.',
        ]);

        Course::create([
            'owner_id' => $owner->id,
            'category_id' => $cat3->id,
            'name' => 'Entrepreneurship Fundamentals',
            'slug' => 'entrepreneurship-fundamentals',
            'description' => 'Pelajari dasar-dasar kewirausahaan dan bagaimana memulai serta mengembangkan bisnis yang sukses.',
        ]);
    }
}
