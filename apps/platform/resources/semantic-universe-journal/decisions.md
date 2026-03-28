# Semantic Universe Decisions

Bu dosya, bugune kadar alinan ana kararlarin kisa kaydidir.

## D-001 | Semantic Universe ana ust sistemdir

Karar:
- Semantic Universe, tekil bir uygulama degil; tum alt urunleri ve sistemleri tasiyan ana ust sistemdir.

Neden:
- kullanicinin butun urunlerini ve standartlarini tek cati altinda toplamak icin

## D-002 | Laravel zemin, Semantic Universe ust sistem

Karar:
- Laravel bir framework/platform zemini olarak ele alinacak
- Semantic Universe bu zemin uzerinde kurulan `System Ana Yuklenicisi` olacak

Neden:
- framework ile ust sistemi kavramsal olarak karistirmamak

## D-003 | Yazilim yasam dongusunda Spiral model kullanilacak

Karar:
- gelisim, test ve yayin akisinda Spiral model esas alinacak

Neden:
- buyuk, riskli ve felsefi derinligi olan bu sistem dogrusal ilerlemiyor

## D-004 | Once staging, sonra production

Karar:
- local -> GitHub -> staging -> production sirasi izlenecek

Neden:
- risk azaltmak
- AI araclariyla paylasimli test yapmak

## D-005 | PostgreSQL ana veri tabani yonu olacak

Karar:
- Semantic Universe icin ana veri tabani yonu PostgreSQL

Neden:
- jsonb
- event/state/rule metadata
- yari-yapisal veri tasima kolayligi

## D-006 | God Mode ayri, public alan ayri

Karar:
- God Mode super admin calisma alanlari public shell'den ayrilacak

Neden:
- super admin operasyonlari ile public deneyimi karistirmamak

## D-007 | Once kaynaklar var edilecek

Karar:
- evreni kurmanin ilk pratik adimi `Kaynaklar`

Neden:
- kullanicinin semantik felsefesine gore evren once kaynaklari var ederek kurulur

## D-008 | Ortak hafiza katmani zorunlu

Karar:
- tum isler `timeline`, `decisions`, `definitions`, `experiments` katmanlarina yazilacak

Neden:
- yapilanlar kaybolmasin
- documentary/timeline web katmani sonradan uretilebilsin

## D-009 | Staging alan adi `staging.semanger.com` olacak

Karar:
- internetten erisilebilir ilk resmi test ortami `staging.semanger.com` altinda calisacak

Neden:
- production/public alani ile gelistirme ve test alanini ayirmak

## D-010 | SemanticUniverse shell'i resmi olarak Laravel icine tasinacak

Karar:
- `local-platform` artik gecici prototip kaynak olarak kalacak
- resmi calisan shell Laravel app icindeki route/view/public asset yapisinda yurutulecek

Neden:
- GitHub, staging ve ileride production hattinda ayni uygulama omurgasini kullanmak

## D-011 | Journal web katmani sifreli gosterilecek

Karar:
- timeline, decisions, definitions ve experiments kayitlari staging uzerinde sifre korumali bir journal sayfasinda gosterilecek

Neden:
- ortak hafizayi hem korunur hem de gorunur yapmak
- sonradan belgesel/timeline sunum katmanina zemin hazirlamak

## D-012 | History ayri hosttan sunulacak

Karar:
- journal/history katmani `history.semanger.com` uzerinden ayri bir host olarak sunulacak

Neden:
- staging atolyeyi calisma alani olarak korurken tarihce ve belgesel katmanina ayri bir kimlik vermek

Sonuc:
- staging sunucuda history hostu icin ayri Nginx vhost'u hazirlandi; kalan is DNS A kaydinin `89.252.182.73`e yonlenmesi
