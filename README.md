# Video Game Catalog Management System

A dynamic web application designed to demonstrate a complete content management system for a video game store. Built with **PHP** and **Bootstrap**, this project features a dual-interface system comprising a public-facing User Panel and a restricted Admin Panel.

## Overview

The application simulates a video game shop where users can browse a catalog of games, view details, and read blog posts. Behind the scenes, administrators have full control over the displayed content through a secure dashboard, allowing them to manage the database of games and users in real-time.

## Key Features

### User Panel (Public)
*   **Catalog Browsing:** View a list of available video games with prices and categories.
*   **Blog & Updates:** Access the latest news and game reviews.
*   **Responsive Design:** Optimized for various devices using Bootstrap 5.

### Admin Panel (Restricted)
*   **Secure Access:** Protected via login authentication.
*   **Content Management:** Add, edit, or delete games and genres.
*   **Data Control:** Directly influences what is shown on the User Panel.

## Tech Stack

*   **Backend:** PHP
*   **Frontend:** Bootstrap 5, HTML5, CSS3
*   **Database:** MySQL

## Getting Started

### Prerequisites
*   A local server environment (e.g., XAMPP, WAMP, or LAMP) with PHP and MySQL support.

### Installation
1.  **Database Setup:** Import the `datos.sql` file into your MySQL database to set up the necessary tables and initial data.
2.  **Configuration:** Update `config.php` with your local database and email credentials.

### Access & Credentials

To access the **Admin Panel**, navigate to `/admin` and use the following credentials:

*   **Email:** `andrei@local.com`
*   **Password:** `1234`

> **Note:** These credentials grant full administrative privileges to explore the system's capabilities.