<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->insert([
            "id" => 1,
            "name" => "Hoa cúc họa mi",
            "type" => 1,
            "id_shop" => 1,
            "img" => "https://i.ibb.co/0mPtM1k/bo-hoa-cuc-hoa-mi-2-removebg-preview.png",
            "price" => 120000,
            "description" => "Hoa cúc dại (Cúc họa mi) – loài hoa tượng trưng cho Tình yêu thầm lặng: Một cái gọi là yêu sâu sắc một người và lặng lẽ dõi theo người đó. Một thứ tình yêu tuyệt đối chân thành, giản dị, không vẩn đục, mong mỏi người mình yêu được hạnh phúc mãi mãi.",
            "discount" => 10,
            "heart" => 0,
            "quantity" => 100,
            "created_at" => "2021-02-23 15:38:32.000000",
            "updated_at" => "2021-02-23 15:38:32.000000"
        ]);
        DB::table('product')->insert([
                "id"=> 2,
                "name"=> "Hoa hồng",
                "type"=> 1,
                "id_shop" => 1,
                "img"=> "https://www.google.com/search?q=hoa+h%E1%BB%93ng&rlz=1C1CHBF_enVN936VN936&source=lnms&tbm=isch&sa=X&ved=2ahUKEwjApNiu4JHwAhVVUd4KHcDvCZkQ_AUoAXoECAEQAw&biw=1920&bih=912#imgrc=N6FcKBH-pZze6M",
                "price"=> 200000,
                "description"=> "Loài hoa biểu trưng cho tình yêu mãnh liệt, phù hợp tặng cho nửa kia của bạn. Ngại gì không tặng ngay cho nàng một bó?",
                "discount"=> 7,
                "heart"=> 0,
                "quantity"=> 100,
                "created_at"=> "2021-02-24 03:55:09.000000",
                "updated_at"=> "2021-02-24 03:55:09.000000"
                ]);
        DB::table('product')->insert([
                "id"=> 3,
                "name"=> "Hoa lan",
                "type"=> 1,
                "id_shop" => 3,
                "img"=> "https://hoatuoi24h.com.vn/wp-content/uploads/2019/12/hoa-lan-ho-diep-cung-dan-yeu-thuong.png",
                "price"=> 150000,
                 "description"=> "Loài hoa biểu trưng cho tình yêu mãnh liệt, phù hợp tặng cho nửa kia của bạn. Ngại gì không tặng ngay cho nàng một bó?",
                "discount"=> 15,
                "heart"=> 0,
                "quantity"=> 100,
                "created_at"=> "2020-02-24 03:57:05.000000",
                "updated_at"=> "2020-02-24 03:57:05.000000"
                ]);
        DB::table('product')->insert([
                "id"=> 4,
                "name"=> "Hoa tulip",
                "type"=> 1,
                "id_shop" => 3,
                "img"=> "https://hoaonline247.com/theme/V08/lib/ckfinder/userfiles/files/hoa-tulip-6.jpg",
                "price"=> 120000,
                "description"=> "Loài hoa biểu trưng cho tình yêu mãnh liệt, phù hợp tặng cho nửa kia của bạn. Ngại gì không tặng ngay cho nàng một bó?",
                "discount"=> 0,
                "heart"=> 0,
                "quantity"=> 100,
                "created_at"=> "2020-12-24 04:00:55.000000",
                "updated_at"=> "2020-12-24 04:00:55.000000"
                ]);
        DB::table('product')->insert([
                "id"=> 5,
                "name"=> "Bông cúc họa mi",
                "type"=> 1,
                "id_shop" => 3,
                "img"=> "https://hoacuoivn.com/wp-content/uploads/2019/07/hoa-cuoi-cuc-hoa-mi-diu-dang-goi-nang-ve-4.jpg",
                "price"=> 150000,
                 "description"=> "Hoa cúc dại là loài hoa mang ý nghĩa thể hiện sự chân thành và nồng nhiệt trong tình yêu. Chính điều đó mà loài hoa này được coi nhà là hoa may mắn. Tặng vợ, tặng người yêu hay crush đều đang thể hiện sự chân thành và thật tâm của bạn trong mối quan hệ hiện tại.\r\n",
                "discount"=> 5,
                "heart"=> 1,
                "quantity"=> 5,
                "created_at"=> "2021-08-02 16:22:51.000000",
                "updated_at"=> "2021-08-02 16:22:51.000000"
                ]);
        DB::table('product')->insert([
            "id"=> 6,
            "name"=> "Bộ son lì novo nội địa Trung",
            "type"=> 2,
            "id_shop" => 2,
            "img"=> "https://i.ibb.co/yp1VK2g/son-novo-removebg-preview.png",
            "price"=> 200000,
            "description"=> "Còn gì tuyệt vời hơn khi nàng thơ của bạn sở hữu bộ son thần thánh tuyệt vời này? Novo lipstick tự tin nói rằng mình là vũ khí bí mật giúp các nàng trở nên lấp lánh và xinh đẹp hơn. ",
            "discount"=> 3,
            "heart"=> 0,
            "quantity"=> 55,
            "created_at"=> "2021-07-02 16:32:43.000000",
            "updated_at"=> "2021-07-04 16:32:43.000000"
        ]);
        DB::table('product')->insert([
            "id"=> 7,
            "name"=> "Bộ son matte siêu xinh",
            "type"=> 2,
            "id_shop" => 1,
            "img"=> "https://i.ibb.co/YcMD7Wm/son-matte-removebg-preview.png",
            "price"=> 250000,
            "description"=> "Dòng son Matte nội địa Trung hiện đang là son được phái nữ Trung Quốc ưa chuộng nhất. Vừa giúp môi hồng rạng rỡ, vừa cấp ẩm dưỡng môi, ăn uống không sợ lem hay trôi, vì sao không mua ngay tặng nàng yêu?",
            "discount"=> 4,
            "heart"=> 0,
            "quantity"=> 47,
            "created_at"=> "2021-03-02 16:52:33.000000",
            "updated_at"=> "2021-03-07 16:52:33.000000"
        ]);
        DB::table('product')->insert([
            "id"=> 8,
            "name"=> "Bánh sinh nhật",
            "type"=> 2,
            "id_shop" => 3,
            "img"=> "https://top10quynhon.com/wp-content/uploads/Tiem-banh-sinh-nhat-Quy-nhon.jpg",
            "price"=> 300000,
            "description"=> "Hoa hồng có tên khoa học là Rosa sp, họ Rosaceae. Hiện nay với hơn 200 loại hoa hồng khác nhau. Được biết có một giống hoa hồng lâu đời nhất thế giới tên là Rosa gallica.",
            "discount"=> 20,
            "heart"=> 0,
            "quantity"=> 30,
            "created_at"=> "2021-05-04 11:06:10.000000",
            "updated_at" => "2021-05-07 11:06:10.000000"
            ]);
        DB::table('product')->insert([
            "id"=> 9,
            "name"=> "Bánh kem",
            "type"=> 2,
            "id_shop" => 1,
            "img"=> "https://list.vn/wp-content/uploads/2018/11/20066831_125724508037021_6013281722836189184_n.jpg",
            "price"=> 150000,
            "description"=> "Hoa hồng có tên khoa học là Rosa sp, họ Rosaceae. Hiện nay với hơn 200 loại hoa hồng khác nhau. Được biết có một giống hoa hồng lâu đời nhất thế giới tên là Rosa gallica.",
            "discount"=> 20,
            "heart"=> 0,
            "quantity"=> 30,
            "created_at"=> "2021-06-04 11:06:10.000000",
            "updated_at"=> "2021-06-07 11:06:10.000000"
        ]);
        DB::table('product')->insert([
        "id"=> 10,
        "name"=> "Bánh sinh nhật dàng cho bé",
        "type"=> 1,
        "id_shop" => 2,
        "img"=> "https://st.quantrimang.com/photos/image/2019/06/26/banh-sinh-nhat-2.jpg",
        "price"=> 300000,
        "description"=> "Thực tế, hoa đại có nhiều màu sắc khác nhau nhưng đa phần thì chúng ta sẽ bắt gặp những bông hoa màu trắng, phần bên trong cánh hơi vàng và được rất nhiều người yêu thích.",
        "discount"=> 20,
        "heart"=> 0,
        "quantity"=> 30,
        "created_at"=> "2020-05-04 11:06:10.000000",
        "updated_at"=> "2020-05-07 11:06:10.000000"
        ]);
        DB::table('product')->insert([
        "id"=> 11,
        "name"=> "Áo thun du lịch",
        "type"=> 2,
        "id_shop" => 3,
        "img"=> "https://printstyle.vn/image/cache/catalog/2021/du-het-hoi-van-phai-choi-500x500.jpg",
        "price"=> 120000,
        "description"=> "Trong top các loài hoa đẹp trên thế giới thì chắc chắn hoa hồng sẽ là loài hoa không thể không nhắc đến. Từ lâu, hoa hồng được biết đến chính là biểu tượng cho một tình yêu mãnh liệt, say đắm",
        "discount"=> 2,
        "heart"=> 0,
        "quantity"=> 12,
        "created_at"=> "2020-05-04 11:06:10.000000",
        "updated_at"=> "2020-05-09 11:06:10.000000"
        ]);
        DB::table('product')->insert([
        "id"=> 12,
        "name"=> "Áo đi theo nhóm",
        "type"=> 2,
        "id_shop" => 1,
        "img"=> "https://aothunblak.vn/upload/mau-ao-nhom/mau-ao-nhom-di-du-lich-090218-19.jpg",
        "price"=> 12,
        "description"=> "Đây là một loài hoa đẹp được rất nhiều người ưa chuộng, đặc biệt là trong giới nhà giàu. Phong lan được biết đến là loài hoa mạnh mẽ bởi nó có thể trồng trong nhiều điều kiện khác nhau.",
        "discount"=> 2,
        "heart"=> 0,
        "quantity"=> 80000,
        "created_at"=> "2020-03-02 11:06:10.000000",
        "updated_at"=> "2020-03-07 11:06:10.000000"
        ]);
        DB::table('product')->insert([
        "id"=> 13,
        "name"=> "Bánh chocolate",
        "type"=> 3,
        "id_shop" => 1,
        "img"=> "https://english4u.com.vn/Uploads/files/Banh-chocolate.jpg",
        "price"=> 100000,
         "description"=> "scsdf",
        "discount"=> 4,
        "heart"=> 0,
        "quantity"=> 3,
        "created_at"=> "2021-02-04 11:06:10.000000",
        "updated_at"=> "2021-03-08 11:06:10.000000"
        ]);
        DB::table('product')->insert([
        "id"=> 14,
        "name"=> "Bánh vừng mặt trăng",
        "type"=> 4,
        "id_shop" => 4,
        "img"=> "https://toisongkhoe.com/wp-content/uploads/2021/01/banh-vung-chien-gion-rum.jpg",
        "price"=> 100000,
        "description"=> "Đây cũng là một loài hoa có rất nhiều màu sắc khác nhau, mỗi một màu sắc đều mang một ý nghĩa riêng và nó được sử dụng trong nhiều trường hợp khác nhau.",
        "discount"=> 54,
        "heart"=> 0,
        "quantity"=> 5,
        "created_at"=> "2021-03-04 11:06:10.000000",
        "updated_at"=> "2021-03-16 11:06:10.000000"
        ]);
        DB::table('product')->insert([
                "id"=> 15,
                "name"=> "Bánh bông lan",
                "type"=> 4,
                "id_shop" => 4,
                "img"=> "https://cdn.daylambanh.edu.vn/wp-content/uploads/2019/12/banh-bong-lan-pho-mai-600x400.jpg",
                "price"=> 100000,
                "description"=> "Nhưng đúng như tên gọi, loài hoa này có hình trái tim, phần giữa của hoa bị rẽ ra nhỏ xuống hệt như bị rỉ máu.",
                "discount"=> 54,
                "heart"=> 0,
                "quantity"=> 5,
                "created_at"=> "2021-02-07 11:06:10.000000",
                "updated_at"=> "2021-02-28 11:06:10.000000"
                ]);
    }
}
