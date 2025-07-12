# Evenzo

Evenzo is a modern event management platform designed to connect organizers and participants seamlessly. It enables event creation, participant interaction through galleries and comments, merchandise browsing, and AI-powered feedback analysis for improved event experiences.

## Table of Contents

* [About the Project](#about-the-project)
* [Features](#features)
* [Tech Stack](#tech-stack)
* [Getting Started](#getting-started)
  * [Prerequisites](#prerequisites)
  * [Installation](#installation)
  * [Running Locally](#running-locally)
* [Usage](#usage)
* [Screenshots & Demo](#screenshots--demo)
* [Roadmap](#roadmap)
* [Contributing](#contributing)
* [Contact](#contact)

## About the Project

Evenzo is an intelligent event management system that allows organizers to create and manage events, upload galleries, and analyze participant feedback using artificial intelligence. Participants can browse events, comment, customize profiles, and shop event merchandise, while admins maintain full control over users and content.

## Features

* Event creation and management
* Participant browsing, commenting, and profile customization
* Gallery upload, update, and deletion
* Merchandise browsing and purchase interface
* AI-driven feedback sentiment analysis
* User and admin management system
* Detailed event participation reports and statistics

## Tech Stack

**Backend:**
* PHP (Laravel framework)
* MySQL database

**Frontend:**
* Blade templates / Vue.js (if applicable)

**Other Tools:**
* AI integration for sentiment analysis
* Git for version control

## Getting Started

### Prerequisites

* PHP >= 8.0
* Composer
* MySQL
* Node.js and npm (if using frontend build tools)

### Installation

1. Clone the repository:

```bash
git clone https://github.com/inessharbaoui/Evenzo.git
cd Evenzo
```

2. Install PHP dependencies:

```bash
composer install
```

3. Copy the environment file and configure:

```bash
cp .env.example .env
# Then update your DB and other settings in .env
```

4. Generate app key:

```bash
php artisan key:generate
```

5. Run migrations:

```bash
php artisan migrate
```

6. (Optional) Install frontend dependencies:

```bash
npm install
npm run dev
```

### Running Locally

Start the local development server:

```bash
php artisan serve
```

Visit `http://localhost:8000` in your browser.

## Usage

* **Organizers** can create, update, or delete events
* **Participants** can browse events, view galleries, comment, and buy merchandise
* **Admins** can manage users, events, galleries, merchandise, and review AI feedback analytics

## Screenshots


🖥️ User Interfaces
<img src="https://github.com/user-attachments/assets/f331fa3d-ca32-4de2-bd34-7415d964ae42" width="100%" />
Login
<img src="https://github.com/user-attachments/assets/b164521c-0a7e-41ba-9952-1ee5113c7ff4" width="100%" />
Main Page
<img src="https://github.com/user-attachments/assets/f367cc6c-8674-4737-b146-17acc8558733" width="100%" />
Profile Page
<img src="https://github.com/user-attachments/assets/0cc45c05-b20b-4bfb-b20c-5c37e1031935" width="100%" />
Features
<img src="https://github.com/user-attachments/assets/0e9dd743-b00e-42bd-b4ff-ab971737c733" width="100%" /> <img src="https://github.com/user-attachments/assets/5f32a289-25a5-4580-9b48-09b54a2853fd" width="100%" /> <img src="https://github.com/user-attachments/assets/dc41b62e-6b74-4082-b15c-23392e54ffc0" width="100%" /> <img src="https://github.com/user-attachments/assets/e6dea968-353c-445c-8ce3-cb76c2951ea2" width="100%" />
Gallery
<img src="https://github.com/user-attachments/assets/e081f85b-22e7-4600-a874-9812a7cadb04" width="100%" /> <img src="https://github.com/user-attachments/assets/537f7e7c-421f-4b5b-abf9-b111f25b1a92" width="100%" />
Merchandise
<img src="https://github.com/user-attachments/assets/c2336d1f-c3b5-4882-b6a4-99144ec00e3e" width="100%" /> <img src="https://github.com/user-attachments/assets/ac6783f6-b623-4eba-86b9-29ff5932d9af" width="100%" />
🛠️ Admin Interfaces
Dashboard
<img src="https://github.com/user-attachments/assets/84230445-3023-470f-931e-93565820abf4" width="100%" />
Feedback Analysis (AI)
<img src="https://github.com/user-attachments/assets/e988f86e-4ba8-450d-95d8-6a6126be2124" width="100%" />
Merchandise Management
<img src="https://github.com/user-attachments/assets/c04cc650-9b1c-41f3-af9d-c36bda73dd41" width="100%" />
Event Management
<img src="https://github.com/user-attachments/assets/b3bba82a-5f94-4daf-a33e-d7bbe6d48a43" width="100%" />
Gallery Management
<img src="https://github.com/user-attachments/assets/ab7c718a-0585-46e7-b861-aab9cafbcf1d" width="100%" />
User Management
<img src="https://github.com/user-attachments/assets/c29f58a3-c983-4fd2-82b5-c9d5f36ee00f" width="100%" />


## Roadmap

* User authentication and authorization improvements
* Real-time notifications
* Multi-language support
* Mobile app integration
* Advanced AI analytics dashboard

## Contributing

Contributions are welcome! Please follow these steps:

1. Fork the repo
2. Create a new branch (`git checkout -b feature/YourFeature`)
3. Commit your changes (`git commit -m 'Add some feature'`)
4. Push to your branch (`git push origin feature/YourFeature`)
5. Open a Pull Request

## Contact

**Author:** Iness Harbaoui

* GitHub: [@inessharbaoui](https://github.com/inessharbaoui)
* LinkedIn: [Iness Harbaoui](https://linkedin.com/in/iness-harbaoui)
* Email: ines.harbaoui.ih@gmail.com

**Project Link:** [https://github.com/inessharbaoui/Evenzo](https://github.com/inessharbaoui/Evenzo)

---

⭐ If you find this project useful, please consider giving it a star!
