# Laravel User Management API

## Overview

This project is a simple **User Management API** built using Laravel. It allows basic user operations such as creating, updating, and retrieving user records while maintaining a clean and modular architecture.

## Tech Stack

* PHP 8.x
* Laravel 10.x
* MySQL

## Key Features

* User CRUD functionality
* Request validation using Laravel Form Request
* Password encryption using Laravel hashing
* Caching to improve performance
* Clean and maintainable project structure

## Architecture

The application follows a layered architecture:

Controller
↓
Service Layer
↓
Repository Interface
↓
Repository Implementation
↓
Model


# Controller
    Handles HTTP requests and responses

# Calls service methods
    Service Layer

# Contains business logic
    Handles caching and orchestrates repository calls

# Repository Interface
    Defines the contract for data operations

# Repository Implementation
    Handles database operations using Eloquent ORM

# Model
    Represents the users table and interacts with the database

## Author
Prathamesh Shivaji Chavan
