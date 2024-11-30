<style>
    body {
        cursor: url("assets/img/Roda1.png"), auto;
    }
    body, html {
            margin: 0;
            padding: 0;
            height: 100%;
        }

        /* Video background */
        #video-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover; /* Menutupi seluruh layar */
            z-index: -1; /* Video berada di belakang konten */
        }

        /* Konten di atas video */
        .content {
            position: relative;
            z-index: 1;
            font-family: Arial, sans-serif;
            color: white;
            padding: 20px;
        }
    .search-container {
        display: flex;
        align-items: center;
        border: 2px solid black;
        border-radius: 50px;
        padding: 5px;
        width: 1000px;
        max-width: 100%;
    }

    .search-container input[type="text"] {
        border: none;
        outline: none;
        flex-grow: 1;
        padding: 10px;
        border-radius: 50px;
    }

    .search-container button {
        background-color: black;
        color: white;
        border: none;
        border-radius: 50px;
        padding: 10px 20px;
        cursor: pointer;
        font-size: 16px;
    }

    .search-container .fa-search {
        margin-right: 10px;
        font-size: 20px;
    }
    .blog-item {
        background: #fff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%; /* Semua card akan memiliki tinggi seragam */
    }

    .blog-item:hover {
        transform: translateY(-10px);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
    }

    .blog-item img {
        object-fit: cover;
        transition: transform 0.3s ease;
        border-bottom: 4px solid #f8f9fa;
    }

    .blog-item:hover img {
        transform: scale(1.05);
    }

    .blog-item .bg-white {
        padding: 15px;
    }

    .blog-item .title {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 8px;
        color: #343a40;
    }

    .blog-item .text-muted {
        font-size: 14px;
        color: #6c757d;
    }

    .blog-item .actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 10px;
    }

    .blog-item .btn {
        border-radius: 20px;
        padding: 5px 15px;
        font-size: 14px;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

/* Animasi dan efek untuk tombol "Details" */
    .blog-item .btn-primary {
    height: 50px;
    width: 180px;
    border-radius: 30px;
    position: relative; /* Tetap relatif agar posisi tidak berubah */
    display: grid;
    place-content: center;
    color: #fff;
    font-weight: 500;
    font-size: 14px;
    text-transform: uppercase;
    text-decoration: none;
    box-sizing: border-box;
    background: linear-gradient(90deg, #001f3f, #000000, #3f0071, #b00020);
    background-size: 400%;
    cursor: pointer;
    letter-spacing: 1.5px;
    transition: all 0.3s ease;
}

    /* Animasi saat tombol di-hover */
.blog-item .btn-primary:hover {
    animation: animate 8s linear infinite;
    background-position: 100%;
}

/* Efek tambahan untuk blur saat hover */
.blog-item .btn-primary:before {
    content: '';
    position: absolute;
    top: -5px;
    left: -5px;
    bottom: -5px;
    right: -5px;
    z-index: -1;
    background: linear-gradient(90deg, #001f3f, #000000, #3f0071, #b00020);
    background-size: 400%;
    border-radius: 40px;
    opacity: 0;
    transition: 1s;
}

/* Blur aktif saat hover */
.blog-item .btn-primary:hover:before {
    filter: blur(20px);
    opacity: 1;
    animation: animate 8s linear infinite;
}

/* Keyframes untuk animasi */
@keyframes animate {
    0% {
        background-position: 0%;
    }
    100% {
        background-position: 400%;
    }
}

    .blog-item .btn-secondary {
        background: #6c757d;
        color: #fff;
    }

    .blog-item .btn-secondary:hover {
        background: #5a6268;
    }

/* Pagination Styles */
.pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .pagination .page-item {
            margin: 0 5px;
        }
        .pagination .page-item a {
            text-decoration: none;
            padding: 10px 15px;
            border: 1px solid #333;
            color: #333;
            border-radius: 5px;
        }
        .pagination .page-item.active a {
            background-color: #333;
            color: white;
        }
</style>
<?php
$result = null;  // Menyimpan hasil query
$limit = 15;     // Jumlah data per halaman
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;  // Halaman saat ini
$offset = ($page - 1) * $limit;  // Menghitung offset

// Periksa apakah pencarian dilakukan
if (isset($_POST["cari"])) {
    $keyword = $_POST["keyword"];
    $_GET['keyword'] = $keyword; // Simpan keyword ke $_GET untuk pagination
} else {
    $keyword = $_GET['keyword'] ?? ''; // Ambil keyword dari GET jika tersedia
}

// Query SPARQL untuk pencarian
if (!empty($keyword)) {
    // Tidak perlu urlencode untuk keyword dalam REGEX
    $keywordForRegex = $keyword;

    // Query SPARQL dengan pencarian dan pagination
    $query = "
    PREFIX carverse: <http://www.semanticweb.org/brisb/ontologies/2024/10/carverse#>
    PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>

    SELECT DISTINCT ?name ?class ?thumbnail ?layout ?manufacturer WHERE {
        ?d a carverse:car;
             rdfs:label ?name;
             carverse:carverseclass ?class;
             carverse:carversethumbnail ?thumbnail;
             carverse:carverselayout ?layout;
             carverse:carversemanufacturer ?manufacturer.
        FILTER (
            REGEX(?name, \"$keywordForRegex\", \"i\") ||
            REGEX(?class, \"$keywordForRegex\", \"i\") ||
            REGEX(?layout, \"$keywordForRegex\", \"i\") ||
            REGEX(?manufacturer, \"$keywordForRegex\", \"i\")
        )
    }
    ORDER BY ?name
    LIMIT $limit OFFSET $offset
    ";

    $result = $sparqlJena->query($query);

    // Query untuk menghitung total data pencarian
    $totalQuery = "
    PREFIX carverse: <http://www.semanticweb.org/brisb/ontologies/2024/10/carverse#>
    PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>

    SELECT (COUNT(DISTINCT ?d) AS ?total) WHERE {
        ?d a carverse:car;
             rdfs:label ?name;
             carverse:carverseclass ?class;
             carverse:carversethumbnail ?thumbnail;
             carverse:carverselayout ?layout;
             carverse:carversemanufacturer ?manufacturer.
        FILTER (
            REGEX(?name, \"$keywordForRegex\", \"i\") ||
            REGEX(?class, \"$keywordForRegex\", \"i\") ||
            REGEX(?layout, \"$keywordForRegex\", \"i\") ||
            REGEX(?manufacturer, \"$keywordForRegex\", \"i\")
        )
    }
    ";
} else {
    // Query default jika tidak ada pencarian
    $query = "
    PREFIX carverse: <http://www.semanticweb.org/brisb/ontologies/2024/10/carverse#>
    PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>

    SELECT DISTINCT ?name ?class ?thumbnail ?layout ?manufacturer WHERE {
        ?d a carverse:car;
             rdfs:label ?name;
             carverse:carverseclass ?class;
             carverse:carversethumbnail ?thumbnail;
             carverse:carverselayout ?layout;
             carverse:carversemanufacturer ?manufacturer.
    }
    ORDER BY ?name
    LIMIT $limit OFFSET $offset
    ";

    $result = $sparqlJena->query($query);

    // Query untuk menghitung total data tanpa filter
    $totalQuery = "
    PREFIX carverse: <http://www.semanticweb.org/brisb/ontologies/2024/10/carverse#>
    PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>

    SELECT (COUNT(DISTINCT ?d) AS ?total) WHERE {
        ?d a carverse:car.
    }
    ";
}

// Ambil total data untuk menghitung jumlah halaman
$totalResult = $sparqlJena->query($totalQuery);
$totalCount = (int) $totalResult[0]->total->getValue();
$totalPages = ceil($totalCount / $limit);
?>

<video id="video-background" autoplay muted loop>
        <source src="assets/vid/universe.mp4" type="video/mp4">
        Your browser does not support the video tag.
</video>


<!-- Header Start -->
<div class="container-fluid page-header">
    <div class="container">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-4 text-white text-uppercase">Find Car</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0 text-uppercase"><a class="text-white" href="inc/..">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Find Car</p>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->

<!-- Search Start -->
<div class="container-fluid booking mt-5">
    <div class="container pb-5">
        <form method="POST">
            <div class="d-flex justify-content-center">
                <div class="search-container">
                    <input name="keyword" type="text" placeholder="Find Car" value="<?= htmlspecialchars($keyword) ?>" />
                    <button name="cari" type="submit">
                        <i class="fa fa-search"></i> Search
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Search End -->

<!-- Blog Start -->
<div class="container-fluid py-2">
    <div class="container py-1">
        <div class="row">
            <div class="col-lg-12">
                <div class="row pb-3">
                    <?php if ($result && $result->count() > 0) : ?>
                        <?php foreach ($result as $data) : ?>
                            <div class="col-lg-4 col-md-6 mb-4 pb-2">
                                <div class="blog-item">
                                    <div class="position-relative">
                                        <img class="img-fluid w-100" style="height: 250px;" src="<?= $data->thumbnail ?>" alt="Car Thumbnail">
                                    </div>
                                    <div class="bg-white p-4">
                                        <div class="d-flex mb-2">
                                            <a class="text-primary text-uppercase text-decoration-none" href="?p=class&keyword=<?= urlencode($data->class) ?>">
                                                <?= $data->class ?>
                                            </a>
                                        </div>
                                        <a class="title" href="?p=single&keyword=<?= urlencode($data->name) ?>"><?= $data->name ?></a>
                                        <p class="text-muted mb-2">
                                            Manufacturer: <span class="text-dark"><?= $data->manufacturer ?? 'Unknown' ?></span>
                                        </p>
                                        <p class="text-muted mb-2">
                                            Layout: <span class="text-dark"><?= $data->layout ?? 'N/A' ?></span>
                                        </p>
                                        <div class="actions">
                                            <a class="btn btn-primary" href="?p=single&keyword=<?= urlencode($data->name) ?>" role="button">Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <div class="not-found-2">Data is not found!</div>
                    <?php endif; ?>
                </div>

                <!-- Pagination -->
<div class="pagination">
    <nav>
        <ul class="pagination justify-content-center">
            <?php if ($page > 1): ?>
                <li class="page-item">
                    <a class="page-link" href="?p=search&page=<?= $page - 1 ?>&keyword=<?= urlencode($keyword) ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                    <a class="page-link" href="?p=search&page=<?= $i ?>&keyword=<?= urlencode($keyword) ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>

            <?php if ($page < $totalPages): ?>
                <li class="page-item">
                    <a class="page-link" href="?p=search&page=<?= $page + 1 ?>&keyword=<?= urlencode($keyword) ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</div>

            </div>
        </div>
    </div>
</div>
<!-- Blog End -->
