<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>トップ画面</title>
</head>

<body>
    <p>こんにちは!
        @if (Auth::check())
            {{-- ここ、参考書では\Auth::user()->nameのようにバックスラッシュ入れてたけど不要なんだと。 --}}
            {{-- 名前空間の解決でバグるときに明示的にするために記載する、程度でいいみたい --}}
            {{ Auth::user()->name }}さん
        @else
            ゲストさん
        @endif
    </p>
    @if (Auth::check())
        <p><a href="/logout">ログアウト</a></p>
    @else
        <p>
            <a href="/login">ログイン</a><br>
            <a href="/register">会員登録</a>
        </p>
    @endif
</body>

</html>
