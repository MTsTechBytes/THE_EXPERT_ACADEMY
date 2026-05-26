# Product Requirements Document (PRD)

## Project: The Expert Academy

### Overview
**The Expert Academy** is an educational institution founded by **Sher Wali Dar** in 2023, providing quality education for 3 years. Located near Shalley Valley Range Road in Swat, the academy offers comprehensive education from Nursery to Class 12 (Pakistan Curriculum).

### Objective
Build a modern online learning platform for The Expert Academy to showcase its programs, manage student enrollments, and provide seamless access to educational resources across all offered subjects and programs.

---

## 1. Product Overview

The Expert Academy online platform with separate frontend, backend, admin, and student areas. It provides:
- Public marketing pages featuring academy information, programs, and instructor credibility
- Course/Program listings and enrollment management
- User authentication and registration for students
- Student dashboards with course access and progress tracking
- Admin management tools for courses, students, and analytics

---

## 2. Company Information

### The Expert Academy
- **Founder:** Sher Wali Dar
- **Established:** 2023
- **Operating Period:** 3 Years
- **Location:** Near Shalley Valley Range Road, Swat, KP, Pakistan

### Programs & Subjects
- **Classes Offered:** Nursery to Class 12 (Pakistan Curriculum)
- **Science Group:** Physics, Chemistry, Biology, Mathematics
- **Pre-Medical:** Specialized pre-med preparation
- **Pre-Engineering:** Advanced mathematics and sciences
- **ICS (Computer Science):** Computer Science & Programming
- **Humanities:** All humanities subjects

---

## 3. User Personas

### 3.1 Visitor
- Wants to learn about The Expert Academy, its programs, location, and admission details
- Should be able to view homepage, about, programs, contact, login, and register pages

### 3.2 Student
- Wants to enroll in programs, access course materials, track progress, and submit assignments
- Needs an authenticated dashboard with course management

### 3.3 Administrator
- Wants to manage programs, courses, students, and view analytics
- Requires access to admin panels, API endpoints, and data controls

---

## 4. Functional Requirements

### 4.1 Frontend
Structure:
- `frontend/index.html` - Homepage with academy info and featured programs
- `frontend/about.html` - Detailed academy information, founder bio, programs offered
- `frontend/courses.html` - Program catalog with filtering
- `frontend/contact.html` - Contact form with location and contact details
- `frontend/login.html` - Secure student login
- `frontend/register.html` - Student registration with validation
- `frontend/assets/css/` - Responsive styling
- `frontend/assets/js/` - Interactive features
- `frontend/assets/images/` - Academy logos and media

Key features:
- Professional branding highlighting founder (Sher Wali Dar) and 3-year history
- Program showcase (Science, Pre-Med, Pre-Eng, ICS, Humanities)
- Location information and contact details
- Responsive mobile-friendly design
- Secure authentication workflows

### 4.2 Backend
Structure:
- `backend/config/` - Database and environment configuration
- `backend/api/` - REST endpoints for programs, students, enrollments
- `backend/auth/` - Session/JWT authentication
- `backend/middleware/` - Input validation, error handling, access control

Core features:
- Program management (CRUD operations)
- Student enrollment system
- Progress tracking
- Assignment submission
- Certificate issuance

### 4.3 Admin Dashboard
Structure:
- `admin/dashboard.html` - Analytics and statistics overview
- Admin management tools for programs, students, and revenue

Features:
- Real-time statistics (students, programs, enrollments)
- Program creation and management
- Student management and enrollment tracking
- Revenue analytics
- Activity feed and reporting

### 4.4 Student Dashboard
Structure:
- `student/dashboard.html` - Personalized student learning hub

Features:
- Enrolled programs display with progress tracking
- Pending assignments view
- Certificate tracking
- Profile management
- Course continuation and progress monitoring

### 4.5 Database
Structure:
- `database/` - Schema and seed files

Requirements:
- User/student profiles with roles
- Program and course management
- Enrollment and progress tracking
- Assignment submission tracking
- Certificate generation
- Admin activity logs

---

## 5. Non-functional Requirements

- **Performance:** Pages load quickly, responsive to user interactions
- **Security:** Protect student data, secure authentication, input validation
- **Maintainability:** Clear code structure, documentation, modular design
- **Scalability:** Support growing student base and programs
- **Accessibility:** WCAG compliance for navigation and forms
- **Branding:** Consistent visual identity reflecting The Expert Academy

---

## 6. Success Criteria

### Minimum Viable Product (MVP)
- Public pages displaying academy information and founder details
- Complete program listing (Science, Pre-Med, Pre-Eng, ICS, Humanities)
- Student registration and login fully functional
- Admin can manage programs and view basic statistics
- Student dashboard shows enrolled programs and progress

### Acceptance Conditions
- All pages render without errors
- Academy location and contact information clearly displayed
- Founder (Sher Wali Dar) properly credited
- All programs accurately represented
- Authentication system works correctly
- Admin and student dashboards functional

---

## 7. Assumptions and Constraints

- Initially web-based with HTML, CSS, JavaScript frontend and PHP backend
- Support for Pakistan curriculum standards (Classes Nursery-12)
- Initially targets Swat region, expandable to other areas
- Free initial platform with potential future premium features

---

## 8. Future Enhancements

- Mobile app (iOS/Android)
- Online payment integration
- Video lecture hosting
- Live class functionality
- Parent portal for tracking student progress
- SMS notifications for students/parents
- AI-powered progress recommendations
- Alumni network
