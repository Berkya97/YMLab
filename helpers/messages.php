<?php
if(!defined("CONTROL"))die("access denied");

class SystemMessages{
    const unknown = "Bir hata meydana geldi";
}

class SignMessages{
    const success = "Kayıt başarılı";
    const shortPass = "şifreniz 5 karakterden daha uzun olmalıdır";
    const errMatchPass = "Parolalar uyuşmuyor";
    const invalidEmail = "email adresi geçerli değil";
    const usedEmail = "email adresi zaten kullanılıyor";
}



class UserMessages{
    const getUser = "getUser metodu içerisindesiniz";
}

class LoginMessages{
    const OK = "getUser metodu içerisindesiniz";
    const ERR_PASS = "kullanıcı adı ve şifrenizi kontrol ediniz";
    const NOT_FOUND = "Bu eposta adresine ait kayıtlı kullanıcı bulunamadı";
}

