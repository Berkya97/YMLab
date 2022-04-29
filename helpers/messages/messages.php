<?php
if(!defined("CONTROL"))die("access denied");

class SystemMessages{
    const unknown = "Bir hata meydana geldi";
}

class SignMessages{
    const success = "Kayıt başarılı";
    const successTemp = "Kayıt başarılı. Lütfen aktivasyon için mail adresinize gönderilen linke tıklayınız";
    const shortPass = "şifreniz 5 karakterden daha uzun olmalıdır";
    const errMatchPass = "Parolalar uyuşmuyor";
    const invalidEmail = "email adresi geçerli değil";
    const usedEmail = "email adresi zaten kullanılıyor";
    const reRegisterTime = "Lütfen size gönderilen aktivasyon linkine tıklayınız ya da yeniden kayıt olmak için beklemeniz gereken süre : ";
}



class UserMessages{
    const getUser = "getUser metodu içerisindesiniz";
}

class LoginMessages{
    const success = "Giriş başarılı";
    const ERR_PASS = "kullanıcı adı ve şifrenizi kontrol ediniz";
    const NOT_FOUND = "Bu eposta adresine ait kayıtlı kullanıcı bulunamadı";
}

