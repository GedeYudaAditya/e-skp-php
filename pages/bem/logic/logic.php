<?php
function slugify($slug)
{
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $slug)));
    return $slug;
}

if (isset($_POST['tambahKegiatan'])) {
    $name = $_POST['name'];
    $skp_point = $_POST['skp_point'];
    $kegiatan = new Event();
    // cek apakah kegiatan sudah ada
    $cek = $kegiatan->getEvent([
        'name' => $name
    ]);
    if ($cek) {
        echo "<script>alert('Kegiatan sudah ada!')</script>";
        $_SESSION['error'] = 'Kegiatan sudah ada!';
        echo "<script>window.location.href = '?page=bem'</script>";
    } else {
        $kegiatan->addEvent([
            'slug' => slugify($name),
            'name' => $name,
            'skp_point' => $skp_point,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        $_SESSION['success'] = 'Kegiatan berhasil ditambahkan!';
        header('Location: ' . BASE_URL . '/?page=bem');
    }
}

if (isset($_POST['editKegiatan'])) {
    $name = $_POST['name'];
    $skp_point = $_POST['skp_point'];
    $kegiatan = new Event();

    // var_dump($_POST['slug']);
    // die;

    try {
        $kegiatan->updateEvent(
            $_POST['slug'],
            [
                'name' => $name,
                'skp_point' => $skp_point,
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        );
        $_SESSION['success'] = 'Kegiatan berhasil diupdate!';
        header('Location: ' . BASE_URL . '/?page=bem');
    } catch (\Throwable $e) {
        $_SESSION['error'] = 'Kegiatan gagal diupdate!';
    }
}

if (isset($_POST['deletKegiatan'])) {
    $kegiatan = new Event();
    $kegiatan->deleteEvent($_POST['slug']);
    $_SESSION['success'] = 'Kegiatan berhasil dihapus!';
    header('Location: ' . BASE_URL . '/?page=bem');
    // clear form data
    $_POST = [];
}

if (isset($_POST['acc'])) {
    $user = new User();
    $user = $user->getUser([
        'username' => $_POST['username']
    ]);

    $userEvents = [];

    foreach ($user['events'] as $event) {
        if ($event['slug'] == $_POST['slug']) {
            $event = [
                'slug' => $_POST['slug'],
                'status' => 'acc',
                'jabatan' => $_POST['jabatan'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }
        $userEvents[] = [
            'slug' => $event['slug'],
            'status' => $event['status'],
            'jabatan' => $event['jabatan'],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
    }


    $user = new User();
    $user->updateUser(
        $_POST['username'],
        [
            'events' => $userEvents,
            'updated_at' => date('Y-m-d H:i:s'),
        ]
    );
}

if (isset($_POST['reject'])) {
    $user = new User();
    $user = $user->getUser([
        'username' => $_SESSION['username']
    ]);

    $userEvents = [];

    foreach ($user['events'] as $event) {
        if ($event['slug'] == $_POST['event_id']) {
            $event = [
                'slug' => $_POST['slug'],
                'status' => 'reject',
                'jabatan' => $_POST['jabatan'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }
        $userEvents[] = [
            'slug' => $event['slug'],
            'status' => $event['status'],
            'jabatan' => $event['jabatan'],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
    }

    $user = new User();
    $user->updateUser(
        $_POST['username'],
        [
            'events' => $userEvents,
            'updated_at' => date('Y-m-d H:i:s'),
        ]
    );
}
