<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Project Management API</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f6f8fa;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        h1, h2, h3 {
            border-bottom: 1px solid #eaecef;
            padding-bottom: 10px;
            margin-top: 24px;
        }
        h1 {
            font-size: 2.5rem;
        }
        p {
            margin-bottom: 16px;
        }
        ul {
            padding-left: 20px;
        }
        li {
            margin-bottom: 8px;
        }
        pre {
            background-color: #f6f8fa;
            border-radius: 6px;
            padding: 16px;
            overflow: auto;
            border: 1px solid #e1e4e8;
        }
        code {
            font-family: ui-monospace, SFMono-Regular, SF Mono, Menlo, Consolas, Liberation Mono, monospace;
            font-size: 14px;
        }
        .badge {
            margin-right: 10px;
            vertical-align: middle;
        }
        section {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Laravel Project Management API</h1>
    <p>A robust, secure, and scalable REST API backend built with Laravel. Designed to demonstrate best practices in architecture, security, and automated testing.</p>

    <div class="badges">
        <img src="https://img.shields.io/badge/PHP-8.2-blue" alt="PHP 8.2" class="badge">
        <img src="https://img.shields.io/badge/Laravel-11.x-red" alt="Laravel 11" class="badge">
    </div>

    <hr>

    <section id="about">
        <h2>🚀 About This Project</h2>
        <p>This application serves as a backend for a Project Management tool. It demonstrates production-ready code structure, utilizing a Service Layer to separate business logic from controllers, ensuring the application is maintainable and testable.</p>

        <h3>Key Features</h3>
        <ul>
            <li><strong>Authentication & Security</strong>: Secure token-based authentication using Laravel Sanctum.</li>
            <li><strong>Authorization</strong>: Strict Role-Based Access Control (RBAC) using Policies to ensure data isolation (users cannot access other users' data).</li>
            <li><strong>Clean Architecture</strong>: Implementation of a Service Layer pattern for better separation of concerns.</li>
            <li><strong>Data Transformation</strong>: API Resources to standardize JSON responses and hide sensitive internal data.</li>
            <li><strong>Auto-Documentation</strong>: Interactive API documentation powered by <strong>Dedoc/Scramble</strong>.</li>
            <li><strong>Testing</strong>: Comprehensive Feature Test suite using PHPUnit to guarantee reliability and security.</li>
        </ul>
    </section>

    <section id="architecture">
        <h2>🏗️ Architecture Highlights</h2>
        <p>This project is not just a simple CRUD app; it is built to scale:</p>
        <ol>
            <li><strong>Service Layer Pattern</strong>: Business logic is encapsulated in <code>Services</code>, keeping <code>Controllers</code> thin and focused only on HTTP handling.</li>
{{--            <li><strong>Form Request Validation</strong>: Validation logic is decoupled from controllers using dedicated Request classes.</li>--}}
            <li><strong>API Resources</strong>: Data is transformed cleanly before being sent to the client, ensuring a consistent JSON structure.</li>
        </ol>
    </section>

    <section id="tech-stack">
        <h2>🛠️ Tech Stack</h2>
        <ul>
            <li><strong>Backend</strong>: PHP 8.2, Laravel 11</li>
            <li><strong>Database</strong>: MySQL</li>
            <li><strong>Authentication</strong>: Laravel Sanctum</li>
{{--            <li><strong>Testing</strong>: PHPUnit</li>--}}
            <li><strong>Documentation</strong>: Dedoc/Scramble</li>
        </ul>
    </section>

    <section id="documentation">
        <h2>📖 API Documentation</h2>
        <p>This project features automatically generated API documentation.</p>
        <p>Once the application is running, visit:<br>
            <a href="{{route('site.index')}}/docs/api">{{route('site.index')}}/docs/api</a></p>
    </section>

    <hr>

{{--    <footer>--}}
{{--        <h2>👤 Author</h2>--}}
{{--        <p><strong>[Your Name]</strong><br>--}}
{{--            <em>Freelance Laravel Developer</em></p>--}}
{{--        <ul>--}}
{{--            <li>GitHub: <a href="https://github.com/YOUR_USERNAME">@YOUR_USERNAME</a></li>--}}
{{--            <li>Upwork: <a href="https://www.upwork.com/freelancers/~YOUR_ID">Link to your Upwork Profile</a></li>--}}
{{--        </ul>--}}
{{--    </footer>--}}
</div>

</body>
</html>