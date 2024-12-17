<style>
    body {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }
    main {
        flex: 1;
        display: flex;
    }
    .sidebar {
        width: 250px;
        background-color: #f8f9fa;
        border-right: 1px solid #dee2e6;
        padding: 20px;
    }
    .sidebar .nav-link {
        color: #333;
        padding: 10px 15px;
        display: block;
        border-radius: 5px;
    }
    .sidebar .nav-link:hover {
        background-color: #e9ecef;
    }
    .sidebar .nav-link.active {
        background-color: #007bff;
        color: white;
    }
    .content-wrapper {
        flex-grow: 1;
        padding: 20px;
        overflow-y: auto;
    }
    .content-wrapper-full {
        flex-grow: 1;
        padding: 20px;
        overflow-y: auto;
        width: 100%;
    }
    @media (max-width: 768px) {
        .sidebar {
            width: 100%;
            position: static;
        }
    }

    .navbar-brand img {
    max-height: 40px;
    max-width: 150px;
    object-fit: contain;
}

@media (max-width: 768px) {
    .navbar-brand img {
        max-height: 30px;
        max-width: 120px;
    }
}
</style>