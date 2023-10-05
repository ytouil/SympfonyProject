
# MyGuitars: A Symphony Web Application

## Introduction
`MyGuitars` is a web application designed to manage and display an inventory of guitars. This application is powered by the Symfony framework, seamlessly blending back-end and front-end technologies to ensure an intuitive user experience. The application provides an interface for users to interact with an inventory of guitars, view individual guitar details, and manage user profiles.

## Database Schema
SQLite serves as the database backbone, striking a balance between efficiency and power for data management. 

#### Entities:

1. **User**:
    - id (Primary Key)
    - email (Unique)
    - full_name
    - bio (Nullable)
    - inventory (One-to-One relation with Inventory)

2. **Inventory**:
    - id (Primary Key)
    - name
    - user (One-to-One relation with User)
    - guitars (One-to-Many relation with Guitar)

3. **Guitar**: 
    - id (Primary Key)
    - modelName
    - description
    - inventory (Many-to-One relation with Inventory)

#### Relationships:

- **User to Inventory**: One-to-One. Each user has one inventory.
- **Inventory to Guitar**: One-to-Many. One inventory can have multiple guitars.

## Project Components

1. **Twig Templates**: We've employed custom templates for a richer front-end experience. 
These templates aid in listing guitar inventories and rendering detailed information about individual guitar models.
  
2. **Controllers**: Custom controllers have been developed to manage user requests, direct routing, 
and process application logic, ensuring a streamlined flow of information.

3. **EasyAdmin**: The administrative aspects of the project are managed efficiently using EasyAdmin. 
This Symfony bundle streamlines CRUD operations, making backend management tasks intuitive for administrators.

## Wrapping Up

The `MyGuitars` application offers a holistic approach to guitar inventory management.
Its design and structure showcase efficient utilization of the Symfony framework,
from the SQLite database operations, frontend design using Twig, to backend administration via EasyAdmin.
This project stands as a testament to the capabilities of Symfony in building feature-rich,
robust web applications.

---

You can customize the content as required or expand on specific points for clarity or depth as per your professor's expectations.