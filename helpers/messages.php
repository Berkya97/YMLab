<?php
if(!defined("CONTROL"))die("access denied");

class UserMessages{
    const getUser = "getUser metodu içerisindesiniz";
    const shortPass = "şifreniz 5 karakterden daha uzun olmalıdır";
    const errMatchPass = "Parolalar uyuşmuyor";
    const invalidEmail = "email adresi geçerli değil";
}

class LoginMessages{
    const OK = "getUser metodu içerisindesiniz";
    const ERR_PASS = "kullanıcı adı ve şifrenizi kontrol ediniz";
    const NOT_FOUND = "Bu eposta adresine ait kayıtlı kullanıcı bulunamadı";
}

