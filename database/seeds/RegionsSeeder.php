<?php

use Illuminate\Database\Seeder;

class RegionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->insert([
            'name' => 'Miền Bắc',
            'slug' => 'mienbac',
            'introduce' => 'Tour Du Lịch Miền Bắc - Vacation World tổ chức các tour du lịch đi các tỉnh miền bắc với giá cực tốt, chất lượng dịch vụ đảm bảo, điểm tham quan hấp dẫn.',
        ],
        [
            'name' => 'Miền Trung',
            'slug' => 'mientrung',
            'introduce' => 'Tour Du Lịch Miền Trung - Vacation World tổ chức các tour du lịch đi các tỉnh miền trung với giá cực tốt, chất lượng dịch vụ đảm bảo, điểm tham quan hấp dẫn.',
        ],
        [
            'name' => 'Miền Nam',
            'slug' => 'miennam',
            'introduce' => 'Tour Du Lịch Miền Nam - Vacation World tổ chức các tour du lịch đi các tỉnh miền nam với giá cực tốt, chất lượng dịch vụ đảm bảo, điểm tham quan hấp dẫn.',
        ],
        [
            'name' => 'Châu Á',
            'slug' => 'chaua',
            'introduce' => 'Tour du lịch Châu Á là thế mạnh của Vacation World, du khách sẽ được khám phá những kỳ quan danh lam thắng cảnh tuyệt đẹp, đậm nét đặc sắc văn hóa vùng miền. Hành trình đa sắc màu ở Cambodia, Lào, Thái, Malaysia-Singapore, Trung Quốc, Nhật Bản, Hàn Quốc...',
        ],
        [
            'name' => 'Châu Âu',
            'slug' => 'chauau',
            'introduce' => 'Vacation World - Top 10 công ty du lịch Hàng Đầu Việt Nam chuyên tổ chức các tour du lịch Châu Âu, thường xuyên mở bán những đường tour mới nhất, đưa bạn tới những điểm đến độc đáo của Châu Âu. Đồng hành cùng Vacation World, du khách sẽ được tận hưởng những giá trị tốt nhất trên mỗi đường tour.',
        ],
        [
            'name' => 'Châu Úc',
            'slug' => 'chauuc',
            'introduce' => 'Vacation World - Top 10 công ty du lịch Hàng Đầu Việt Nam chuyên tổ chức các tour du lịch Châu Úc, thường xuyên mở bán những đường tour mới nhất, đưa bạn tới những điểm đến độc đáo của Châu Úc. Đồng hành cùng Lửa Việt, du khách sẽ được tận hưởng những giá trị tốt nhất trên mỗi đường tour.',
        ],
        [
            'name' => 'Châu Mỹ',
            'slug' => 'mienbac',
            'introduce' => 'Vacation World - Top 10 công ty du lịch Hàng Đầu Việt Nam chuyên tổ chức các tour du lịch Châu Mỹ cao cấp dịch vụ Cao Cấp Chất Lượng. Du lịch Châu Mỹ khám phá những vùng đất mới vừa huyền bí vừa tráng lệ.',
        ]);
    }
}
