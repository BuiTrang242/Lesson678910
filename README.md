# Lesson678910
-Phần bài tập thiết kế và cài đặt cơ sở dữ liệu cho ứng dụng quản lý thư viện rất thực tế: Phần cấu trúc thư mục trong bài tập này rất hợp lý, từ việc chia các thành phần giao diện (header, footer) thành file riêng biệt, đến việc tạo các module.
-Cách kết hợp các thành phần lại với nhau: từ giao diện đơn giản nhưng thân thiện, đến việc hiển thị danh sách thể loại sách, thêm, sửa, xóa, tất cả được xây dựng rất logic. Khi chạy, cảm giác như mình đang quản lý một hệ thống thật sự
-Stored Procedure : Khả năng sửa đổi trực tiếp một thủ tục lưu giúp giảm thời gian và công sức trong việc quản lý cơ sở dữ liệu, có khả năng tái sử dụng. Tuy nhiên nó p sẽ phức tạp khi thủ tục quá lớn.
*View: có thể chèn, cập nhật, và xóa dữ liệu thông qua View mà không cần thao tác trực tiếp trên các bảng cơ sở, giúp bảo mật và dễ quản lý hơn
+WITH CHECK OPTION giúp bảo vệ các thao tác như INSERT hoặc UPDATE, yêu cầu dữ liệu phải tuân theo một số quy tắc đã định sẵn trong View, giúp tránh được việc dữ liệu không hợp lệ bị nhập vào
*Chỉ mục:
-sử dụng chỉ mục:
+Tăng tốc độ tìm kiếm
+Tăng hiệu suất cho các phép toán
+Tối ưu hóa hiệu suất đối với các truy vấn phức tạp
-Các trường hợp nên tạo chỉ mục:
+Cột thường xuyên được tìm kiếm
+Cột được sử dụng trong các phép toán so sánh
+Cột được sử dụng trong việc JOIN giữa các bảng
