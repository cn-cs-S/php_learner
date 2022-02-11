<?php

    require 'vendor/autoload.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require "PHPMailer.php";
    require "Exception.php";
    require "SMTP.php";
    header('Content-Type:text/json;charset=utf-8');



function send_mail($from_url, $from_name, $to_url, $to_name) {
    $mail = new PHPMailer(true);
    $value = $_POST["value"];
    try {
        //服务器配置
        $mail->CharSet ="UTF-8";                     //设定邮件编码
        $mail->SMTPDebug = 0;                        // 调试模式输出
        $mail->isSMTP();                             // 使用SMTP
        $mail->Host = 'smtp.qq.com';                // SMTP服务器
        $mail->SMTPAuth = true;                      // 允许 SMTP 认证
        $mail->Username = '1299216921@qq.com';                // SMTP 用户名  即邮箱的用户名
        $mail->Password = 'dsaacssfshvahcch';             // SMTP 密码  部分邮箱是授权码(例如163邮箱)
        $mail->SMTPSecure = 'ssl';                    // 允许 TLS 或者ssl协议
        $mail->Port = 465;                            // 服务器端口 25 或者465 具体要看邮箱服务器支持

        $mail->setFrom($from_url, $from_name);  //发件人
        $mail->addAddress($to_url, $to_name);  // 收件人

        //Content
        $mail->isHTML(true);                                  // 是否以HTML文档格式发送  发送后客户端可直接显示对应HTML内容
        $mail->Subject = '测试邮件';
        $mail->Body    = '<h1>如果以下内容显示无误则测试成功(这是h1标题)</h1>'.$value;
        $mail->AltBody = 'alt body';

        $mail->send();
        echo '邮件发送成功';
    } catch (Exception $e) {
        echo '邮件发送失败';
    }
}

function test() {
    $mail = $_POST["mail"];
    send_mail("1299216921@qq.com", "测试", $mail, "somebody");
}

test();