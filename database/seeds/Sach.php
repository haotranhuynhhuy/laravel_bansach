<?php

use Illuminate\Database\Seeder;

class Sach extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('sach')->insert(
            [
            ['name'=>'Ngữ pháp Tiếng Trung', 'id_type'=>'3', 'description'=>'Cuốn sách này cũng có thể sử dụng để bồi dưỡng, đào tạo phục vụ cho công tác giảng dạy ngữ pháp, thích hợp cho đối tượng giáo viên tiếng Trung ở nước ngoài, hoặc trong nước (nếu họ chưa học qua chuyên ngành ngôn ngữ). Cuốn sách này đã được sử dụng thử (nghiệm ) trong quá trình đào tạo giáo viên tiếng Trung ở trường Đại học Bắc Kinh và đạt được kết quả cao, giúp các giáo viên tiếng Trung hiểu được các mục ngữ pháp cơ bản của tiếng Trung hiện đại','unit_price'=>'92000','promotion_price'=>'74000','image'=>'nguphaptiengtrung.jpg','unit'=>'quyen','spmoi'=>'1'],
            ['name'=>'Tiếng Đức cho người Việt', 'id_type'=>'3','description'=>'Cuốn sách được biên soạn nhắm đến đối tượng là những người mới bắt đầu học tiếng Đức. Thông qua 10 bài học căn bản, sách trình bày những vấn đề chủ yếu nhất trong ngữ pháp tiếng Đức cũng như phần từ vựng dùng trong sinh hoạt hằng ngày, đồng thời đây cũng là cẩm nang cơ bản nhất dành cho những ai muốn du lịch đến các nước nói tiếng Đức. Chủ đích của sách là dạy kĩ năng giao tiếp quan trọng trong tiếng Đức ở cấp cơ bản.','unit_price'=>'70000','promotion_price'=>'63000','image'=>'tiengducnguoiviet.jpg','unit'=>'quyen','spmoi'=>'0'],
            ['name'=>'Nâng cao toán lớp 3', 'id_type'=>'1','description'=>'Qua các bài kiểm tra giữa kì, cuối kì chúng ta xác định được những ưu điểm của mình sau một giai đoạn rèn luyện; đồng thời, chúng ta cũng tự phát hiện được những khiếm khuyết về kiến thức nói chung và kĩ năng nói riêng để từ đó tự hoàn thiện mình hơn. Với Toán Nâng Cao 3 hi vọng các bạn sẽ mạnh dạn, tự tin hơn trong việc chiếm lĩnh kiến thức nhằm nâng cao kết quả học tập của bản thân','unit_price'=>'42000','promotion_price'=>'','image'=>'toannangcaolop3.jpg','unit'=>'quyen','spmoi'=>'0'],
            ['name'=>'Giải bài tập Vật Lý 11', 'id_type'=>'1','description'=>'Quyển sách này được biên soạn theo chương trình Vật lý 11 hiện hành, với mục tiêu trở thành công cụ hỗ trợ các em học sinh 11 phương pháp tự học. Quyển sách cũng cung cấp quý phụ huynh và các bạn học sinh một cái nhìn bao quát, dễ dàng hấp thụ kiến thức của chương trình học. Từ đó, học sinh có thể chủ động vận dụng sáng tạo để có cách học riêng thú vị theo yêu cầu môn học.','unit_price'=>'45000','promotion_price'=>'','image'=>'baitapvatly11.jpg','unit'=>'quyen','spmoi'=>'1']
            ]
        );
    }
}
