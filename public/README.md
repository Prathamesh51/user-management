# Laravel User Management

## Overview

This project implements a simple **User Management API** using Laravel.
It allows creating, updating, and retrieving users while following a clean architecture.

## Tech Stack

* PHP: 8.2
* Laravel: 12
* Database: MySQL/ PostgreSQL

## Features

* User CRUD APIs (Create, Update, Get)
* Request validation using Laravel Form Request
* Password encryption
* Caching implemented to optimize database queries
* Clean and modular code structure

## Architecture

The project follows a layered architecture.

Controller
↓
Service
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

# Eloquent Repository Implementation
    Handles database operations using Eloquent ORM

# Model
    Represents the users table and interacts with the database

## Author
Prathamesh Shivaji Chavan
