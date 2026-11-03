<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CV Reza')</title>
    <style>
        :root { --ink:#172033; --muted:#687386; --line:#e3e8ef; --blue:#2457d6; --pale:#f3f6fb; }
        * { box-sizing: border-box; }
        body { margin:0; background:#f3f5f9; color:var(--ink); font-family:Inter,Segoe UI,Arial,sans-serif; }
        .topbar { background:#fff; border-bottom:1px solid var(--line); padding:17px 5%; display:flex; align-items:center; justify-content:space-between; gap:16px; }
        .brand { font-weight:800; letter-spacing:.3px; }
        .brand span { color:var(--blue); }
        .nav { display:flex; gap:10px; flex-wrap:wrap; }
        a { color:inherit; text-decoration:none; }
        .btn { border:0; border-radius:10px; padding:10px 15px; font-weight:700; cursor:pointer; display:inline-block; font-size:14px; }
        .btn-primary { background:var(--blue); color:white; }
        .btn-light { background:#eef2f8; color:#263348; }
        .btn-danger { background:#fee9e7; color:#a82920; }
        .wrap { max-width:1100px; margin:34px auto; padding:0 20px; }
        .panel { background:white; border:1px solid var(--line); border-radius:18px; padding:26px; box-shadow:0 12px 35px rgba(20,40,80,.05); }
        .eyebrow { text-transform:uppercase; letter-spacing:2px; font-size:11px; font-weight:800; color:var(--blue); }
        h1 { margin:8px 0 10px; font-size:clamp(26px,4vw,38px); }
        .muted { color:var(--muted); }
        .alert { padding:12px 15px; border-radius:10px; background:#e5f8ed; color:#17653b; margin-bottom:18px; }
        .grid { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:18px; }
        .field { margin-bottom:18px; }
        label { display:block; font-size:13px; font-weight:750; margin-bottom:8px; }
        input, textarea { width:100%; padding:12px 13px; border:1px solid #d9e0eb; border-radius:10px; font:inherit; background:#fff; }
        input:focus, textarea:focus { outline:2px solid #dbe5ff; border-color:var(--blue); }
        textarea { min-height:115px; resize:vertical; }
        .hint { font-size:12px; color:var(--muted); margin-top:6px; }
        .table-wrap { overflow:auto; }
        table { width:100%; border-collapse:collapse; margin-top:20px; }
        th,td { text-align:left; padding:14px 12px; border-bottom:1px solid var(--line); font-size:14px; }
        th { color:var(--muted); font-size:11px; text-transform:uppercase; letter-spacing:1px; }
        .actions { display:flex; gap:7px; flex-wrap:wrap; align-items:center; }
        .actions form { margin:0; }
        .cv-sheet { max-width:900px; margin:auto; background:white; box-shadow:0 20px 60px rgba(20,40,80,.1); border-radius:16px; overflow:hidden; }
        .cv-head { background:#172b4d; color:white; padding:36px 40px; display:flex; align-items:center; gap:24px; }
        .avatar { width:108px; height:108px; border-radius:50%; object-fit:cover; border:4px solid rgba(255,255,255,.55); background:#e8edf6; flex-shrink:0; }
        .avatar-placeholder { display:flex; align-items:center; justify-content:center; color:#172b4d; font-size:32px; font-weight:800; }
        .cv-head h1 { margin:0 0 8px; font-size:32px; }
        .cv-head p { margin:5px 0; color:#dbe6f7; font-size:14px; }
        .cv-body { display:grid; grid-template-columns:1fr 2fr; }
        .cv-side { background:#f2f5fa; padding:28px; }
        .cv-main { padding:28px 32px; }
        .cv-section { margin-bottom:25px; overflow-wrap:anywhere; }
        .cv-section h2 { font-size:13px; letter-spacing:1.5px; text-transform:uppercase; color:var(--blue); padding-bottom:9px; border-bottom:2px solid #dbe4f7; margin:0 0 12px; }
        .cv-text { line-height:1.75; white-space:pre-line; font-size:14px; color:#354056; }
        .empty { padding:45px 15px; text-align:center; color:var(--muted); }
        @media(max-width:700px) { .grid,.cv-body { grid-template-columns:1fr; } .cv-head { padding:26px 22px; flex-direction:column; align-items:flex-start; } .cv-side,.cv-main { padding:24px; } .topbar { align-items:flex-start; flex-direction:column; } }
        @media print { body { background:white; } .topbar,.no-print,.alert { display:none!important; } .wrap { max-width:none; margin:0; padding:0; } .cv-sheet { box-shadow:none; border-radius:0; } .cv-head { -webkit-print-color-adjust:exact; print-color-adjust:exact; } .cv-side { -webkit-print-color-adjust:exact; print-color-adjust:exact; } }
    </style>
</head>
<body>
<header class="topbar no-print">
    <a class="brand" href="{{ route('cv.index') }}">CV<span>STUDIO.</span></a>
    <nav class="nav">
        <a class="btn btn-light" href="{{ route('cv.index') }}">Data CV</a>
        <a class="btn btn-primary" href="{{ route('cv.create') }}">+ Buat CV</a>
    </nav>
</header>
<main class="wrap">
    @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif
    @yield('content')
</main>
</body>
</html>
