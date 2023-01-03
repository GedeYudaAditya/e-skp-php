<?php
if (isset($_POST['ajukan'])) {
    $user = new User();
    $user = $user->getUser([
        'username' => $_SESSION['username']
    ]);

    $userEvents = [];

    foreach ($user['events'] as $event) {
        if ($event['slug'] == $_POST['event_id']) {
            $_SESSION['error'] = 'Kegiatan sudah diajukan';
            header('Location: ' . BASE_URL . '/?page=user/dataKegiatan');
            die;
        }
        $userEvents[] = [
            'slug' => $event['slug'],
            'status' => $event['status'],
            'jabatan' => $event['jabatan'],
            'bukti' => $event['bukti'],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
    }

    if($_FILES['file'] == null ){
        $_SESSION['error'] = 'Kegiatan Memerlukan Bukti';
        header('Location: ' . BASE_URL . '/?page=user/dataKegiatan');
    }

    // Store File
    try {
        $file = $_FILES['file'];
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];

        // var_dump($file);
        // die;

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png', 'pdf');

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 1000000) {
                    $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                    $fileDestination = 'uploads/' . $fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    header("Location: " . BASE_URL . "/?page=user/dataKegiatan&uploadsuccess");
                } else {
                    echo "Your file is too big!";
                }
            } else {
                echo "There was an error uploading your file!";
            }
        } else {
            echo "You cannot upload files of this type!";
        }

        array_push($userEvents, [
            'slug' => $_POST['event_id'],
            'status' => 'pen',
            'jabatan' => $_POST['jabatan'],
            'bukti' => $fileNameNew,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        $user = new User();
        $user->updateUser(
            $_SESSION['username'],
            [
                'events' => $userEvents,
            ]
        );

        $_SESSION['success'] = 'Kegiatan berhasil diajukan';
        header('Location: ' . BASE_URL . '/?page=user/dataKegiatan');
    } catch (\Throwable $e) {
        $_SESSION['error'] = 'Kegiatan gagal diajukan';
        header('Location: ' . BASE_URL . '/?page=user/dataKegiatan');
    }

    // var_dump($userEvents);
    // die;

}
