# Infrastructure Stack

Tarih: 2026-03-27
Durum: Taslak

## Onerilen yigin
- Laravel 13
- PHP 8.5
- PostgreSQL
- Redis
- Nginx
- PHP-FPM
- Supervisor
- GitHub Actions
- Ubuntu LTS

## Neden PostgreSQL
- jsonb tabanli metadata
- event/state/rule payloadlari icin daha guclu ifade alani
- GIN indeksleri
- semantik yapilar icin daha rahat buyume

## Neden staging once
- Spiral modele uygun
- production riskini azaltir
- AI araclariyla ortak test ortami saglar
