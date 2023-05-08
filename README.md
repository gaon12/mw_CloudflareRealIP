# Cloudflare Real IP for MediaWiki

CloudflareRealIP는 미디어위키(Mediawiki)에서 Cloudflare를 사용할 때 원래 사용자의 IP 주소를 복원하는 확장기능입니다. 로그인하지 않고 편집하는 경우 Cloudflare의 IP 주소 대신 실제 사용자의 IP 주소가 저장됩니다.

## 설치

1. 먼저 [GitHub 저장소](https://github.com/gaon12/mw_CloudflareRealIP)에서 확장기능을 다운로드하세요.
2. 다운로드 받은 확장기능을 미디어위키의 "extensions" 폴더에 업로드합니다.
3. 미디어위키의 "LocalSettings.php" 파일을 찾아 아래 코드를 추가하세요:

```php
wfLoadExtension( 'CloudflareRealIP' );
```

## 사용법
이 확장기능을 설치하고 나면 아무런 추가 설정 없이 자동으로 작동합니다. CloudflareRealIP 확장기능은 미디어위키에서 로그인하지 않고 편집할 때 Cloudflare의 IP 주소 대신 원래 사용자의 IP 주소를 저장합니다.

## 참고 사항
* 이 확장기능은 미디어위키 1.25 이상과 호환됩니다.
* 이 확장기능은 Cloudflare 서비스를 사용하는 경우에만 필요하며, Cloudflare를 사용하지 않거나 단순히 DNS만 사용하는 경우 설치할 필요가 없습니다.

## 작동 원리
Cloudflare Real IP 확장 기능의 작동 원리는 다음과 같습니다:

1. 사용자가 미디어위키에서 로그인하지 않고 편집을 진행합니다.
2. Cloudflare는 사용자의 원래 IP 주소를 "CF-Connecting-IP"라는 HTTP 헤더를 통해 전달합니다.
3. 미디어위키에서는 로그인하지 않은 사용자의 IP 주소를 기록하려 할 때 UserGetIP 이벤트가 발생합니다.
4. Cloudflare Real IP 확장 기능은 이 이벤트를 통해 사용자의 IP 주소를 가져옵니다.
5. 확장 기능은 $_SERVER['HTTP_CF_CONNECTING_IP'] 변수를 확인하여 Cloudflare가 전달한 원래 사용자의 IP 주소가 있는지 확인합니다.
6. 원래 사용자의 IP 주소가 있다면, 확장 기능은 이 IP 주소로 미디어위키에 저장되는 IP 주소를 변경합니다.
7. 결과적으로, 미디어위키에서 로그인하지 않은 사용자의 편집 기록에 원래 사용자의 IP 주소가 저장됩니다.

이 확장 기능을 사용하면 Cloudflare를 사용하는 경우에도 미디어위키에서 로그인하지 않은 사용자의 원래 IP 주소를 정확하게 기록할 수 있습니다. 이로 인해 IP 주소를 기반으로 한 사용자 관리 및 안전 조치가 훨씬 간편해집니다.

## 라이선스
이 확장기능은 MIT 라이선스에 따라 배포됩니다. 자세한 내용은 [LICENSE](https://github.com/gaon12/mw_CloudflareRealIP/blob/main/LICENSE) 파일을 참조하세요.

## 문의
문제가 발생하거나 질문이 있으시면 GitHub 저장소의 이슈 탭에서 질문을 남겨주세요.