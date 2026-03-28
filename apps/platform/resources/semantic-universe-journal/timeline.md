# Semantic Universe Timeline

Bu dosya, Semantic Universe yolculugunda bugune kadar yapilan ana isleri tarih sirasi ile toplar.

## 2026-03-26 | Ilk belge ve prototip incelemeleri

Ne yaptik:
- Hemorrhoid calismasi icin mevcut HTML/PHP/form altyapilari incelendi
- form yapilari, hasta/protokol/takip akisi ve veri toplama mantigi uzerinde calisildi

Neden yaptik:
- ilk calisan alan olarak tibbi alan uzerinden bir uygulama ve veri akisi kurmak
- daha buyuk semantik platform dusuncesine bir pilot domain hazirlamak

Sonuc:
- yerelde calisan hasta -> protokol -> klinik form -> takip mantigi kuruldu

## 2026-03-26 | Laravel platform zemini kuruldu

Ne yaptik:
- Laravel tabanli altyapi kuruldu
- hasta, examination protocol, clinical form ve follow-up yapilari olusturuldu
- auth, rol/yetki, temel CRUD ve dashboard katmanlari hazirlandi

Neden yaptik:
- daha guclu ve buyuyebilir bir platform zemini olusturmak
- mevcut prototipten cikarak urunsel mimariye gecmek

Sonuc:
- calisan bir Laravel cekirdegi olustu

## 2026-03-26 | Semantic Universe ust yapisi tanimlanmaya baslandi

Ne yaptik:
- Semantic Universe ana proje fikri, felsefi ust yapi ve bunun ilk belgeleri olusturuldu
- mimari, roadmap, workflow ve backlog belgeleri acildi

Neden yaptik:
- Hemorrhoid gibi tekil uygulamalarin ustune oturacagi ana evreni tarif etmek

Sonuc:
- Semantic Universe resmi bir program ve ust sistem olarak adlandirildi

## 2026-03-26 | Tarihce ve karar hafizasi kuruldu

Ne yaptik:
- history, strategic execution log, decision register, foundation intake gibi belgeler acildi
- documentary layer ve bilgi kabul katmani olusturuldu

Neden yaptik:
- yapilan islerin kaybolmamasi
- ileride manifesto, timeline, documentary ve etkileÅŸimli tarihce katmani kurabilmek

Sonuc:
- yazili hafiza ve karar izi olusmaya basladi

## 2026-03-26 | Semantic Universe local shell kuruldu

Ne yaptik:
- Hemorrhoid alanindan ayri olarak `SemanticUniverse` local platformu acildi
- `http://localhost/SemanticUniverse/` adresinde calisan ayri shell yapisi kuruldu

Neden yaptik:
- public uygulama ile super admin/god mode tabanli ana platformu ayirmak
- semantik evrenin framework ve shell mantigini gorsel olarak gorebilmek

Sonuc:
- ayri local SemanticUniverse kabugu elde edildi

## 2026-03-26 | Semantic Universe shell tasarimi gelistirildi

Ne yaptik:
- top bar, ribbon, left tree nav, center workspace, right context panel, bottom dock yapisi kuruldu
- Outlook + Teams karisimi bir ana platform dili hedeflendi
- responsive/Bootstrap tabanli bir shell uretilmeye calisildi

Neden yaptik:
- kullanicinin semantik sistemi gorsel olarak yonlendirebilecegi bir framework ekrani olusturmak

Sonuc:
- temel shell yapisi ortaya cikti

## 2026-03-26 | System > Kaynaklar > Kaynak Tanimla akisi baslatildi

Ne yaptik:
- ilk ana menu olarak `System`
- onun altinda `Kaynaklar`
- onun altinda `Kaynak Tanimla`
yapisi kuruldu

Neden yaptik:
- kullaniciya gore evreni var etmenin ilk adimi kaynaklari var etmekti

Sonuc:
- ilk semantik veri giris ekraninin iskeleti kuruldu

## 2026-03-26 | God Mode mantigi kuruldu

Ne yaptik:
- God Mode giris/cikis mantigi eklendi
- giris yapildiginda super admin icerigi goren, cikis yaptiginda bos shell gosteren yapi kuruldu
- GodMode profil bilgisi shell'e eklendi

Neden yaptik:
- public gorunum ile yetkili super admin calisma alanini ayirmak

Sonuc:
- kontrol edilen shell modu olustu

## 2026-03-26 | Kullanici semantik felsefeyi aktarmaya basladi

Ne yaptik:
- kullanicinin tibbi, cerrahi, biliÅŸim, sistem muhendisligi ve yonetim bilimi arka plani kayda alindi
- `nesne / olay`
- `nesneden kaynaga gecis`
- `varlik + fonksiyon + aktivite + hedef`
- `insan / tasinir / tasinmaz / zaman`
- `temel / ture / turetilmis / fonksiyonel`
ayrimlari kaydedildi

Neden yaptik:
- Semantic Universe'un kurucu ontolojisini kaybetmeden yazili hafizaya gecirmek

Sonuc:
- ilk semantik cekirdek yazili hale geldi

## 2026-03-26 | Proses felsefesi kayda alindi

Ne yaptik:
- olay evreninin proseslerle aciklanmasi
- proseslerin 4 ana sinifa ayrilmasi
- varlik ve yonetim
- ana is
- destek hizmet
- olcme degerleme ve gelisme
siniflari yazildi

Neden yaptik:
- olay/proses semantigini kaynak semantigi ile birlikte kurmak

Sonuc:
- kaynak + proses tabanli ana kurgu ortaya cikti

## 2026-03-27 | SemanticUniverse resmi GitHub reposu acildi

Ne yaptik:
- `https://github.com/SAGIMKARINCA/SemanticUniverse` reposu acildi
- `C:\Projects\semantic-universe` klasoru bu repoya baglandi
- ilk foundation commitleri ve CI iskeleti eklendi

Neden yaptik:
- local calismayi resmi surumlu merkez haline getirmek

Sonuc:
- GitHub resmi kaynak oldu

## 2026-03-27 | Canliya gecis ve PostgreSQL yonu netlesti

Ne yaptik:
- canliya gecis stratejisi cikartildi
- staging -> production modeli kabul edildi
- PostgreSQL ana veri tabani yonu olarak onerildi
- live platform migration planlari olusturuldu

Neden yaptik:
- Semantic Universe'u SaaS ve POA buyumesine uygun hale getirmek

Sonuc:
- canli mimariye gecis icin plan ve kararlar olustu

## 2026-03-27 | ZEN / Xen Orchestra uzerinde yeni Ubuntu VM denemesi baslatildi

Ne yaptik:
- ZEN panel erisimi dogrulandi
- Xen Orchestra icinde yeni Ubuntu 24.04 VM acma denemeleri yapildi
- network ve boot sorunlari goruldu
- ISO import timeout problemi ile karsilasildi

Neden yaptik:
- staging icin yeni Ubuntu tabanli temiz bir ortam acmak

Sonuc:
- hypervisor/ISO katmaninda zaman kaybi oldugu, once audit ve duzgun ISO stratejisi gerektigi anlasildi

## 2026-03-28 | ZEN Server audit ve optimizasyon fazi baslatildi

Ne yaptik:
- ZEN Server icin audit checklist cikarildi
- VM'ler icin ilk siniflandirma taslagi olusturuldu

Neden yaptik:
- storage/network/VM duzenini anlamadan agresif degisiklik yapmamak

Sonuc:
- guvenli optimizasyon cercevesi olustu

## 2026-03-28 | Ortak Hafiza Katmani istendi

Ne yaptik:
- `semantic-universe-journal` klasoru olusturuldu
- `timeline.md`, `decisions.md`, `definitions.md`, `experiments.md` dosyalari acildi

Neden yaptik:
- tum konusmalarin, kararlarin, tanimlarin ve denemelerin ortak hafizada tutulmasi
- gelecekte bunu timeline / documentary / web katmanina donusturebilmek

Sonuc:
- resmi ortak hafiza katmaninin ilk cekirdegi acildi

## 2026-03-28 | Calisan Ubuntu staging sunucusu kuruldu

Ne yaptik:
- yeni Ubuntu sunucusu `89.252.182.73` adresinde ayaÄŸa kaldirildi
- SSH/SFTP erisimi dogrulandi
- `nginx`, `postgresql`, `redis-server`, `php 8.3`, `composer` kuruldu
- `semanticuniverse_staging` PostgreSQL veritabani ve `semanticuser` kullanicisi olusturuldu
- `SemanticUniverse` GitHub reposu `/var/www/semantic-universe` altina clone edildi
- repo icinde `apps/platform` Laravel uygulamasi kuruldu
- `.env` PostgreSQL'e baglandi ve migration'lar calistirildi

Neden yaptik:
- local calismadan cikarak internetten erisilebilir resmi staging ortami kurmak

Sonuc:
- `staging.semanger.com` uzerinde calisan bir Laravel staging ortami elde edildi

## 2026-03-28 | SemanticUniverse shell Laravel uygulamasina tasinmaya baslandi

Ne yaptik:
- `C:\Projects\semantic-universe\apps\platform` altinda Laravel app olusturuldu
- `local-platform/index.php` mantigi Laravel route + Blade gorunume tasinacak sekilde port script'i yazildi
- `routes/web.php` icine `semantic-universe`, `godmode-login`, `logout` route'lari eklendi
- `resources/views/semantic-universe/shell.blade.php` ve `public/semantic-universe.css` uretilip Laravel app'e tasindi
- route cache temizlenerek yeni route'lar dogrulandi

Neden yaptik:
- ayri bir lokal PHP shell yerine ayni SemanticUniverse reposu icinde resmi Laravel platform katmanina gecmek

Sonuc:
- local shell artik Laravel icinde yasayacak hale getirildi ve staging'e gonderilmeye hazirlandi

## 2026-03-28 | Sifreli journal web katmani kuruldu

Ne yaptik:
- semantic-universe-journal klasorundeki timeline, decisions, definitions ve experiments dosyalari resmi ortak hafiza katmani olarak teyit edildi
- bu dosyalar Laravel staging uygulamasina kopyalandi
- sifre ile acilan bir history/timeline journal sayfasi tasarlandi

Neden yaptik:
- ortak hafizayi sadece dosya sistemi icinde degil, web tabanli korunur bir alanda da gorebilmek
- ileride belgesel / timeline sunum katmanina gecis zemini olusturmak

Sonuc:
- staging ortami icin sifre korumali journal arayuzu hazirlandi