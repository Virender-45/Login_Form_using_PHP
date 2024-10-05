PHP Query for databse table

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,  -- Unique ID for each user
    fname VARCHAR(50) NOT NULL,         -- First name
    lname VARCHAR(50) NOT NULL,         -- Last name
    username VARCHAR(50) NOT NULL,      -- Username
    email VARCHAR(100) NOT NULL,        -- Email (assumed $em to be email)
    password VARCHAR(255) NOT NULL,     -- Password
    signup_date DATETIME NOT NULL,      -- Signup date
    profile_pic VARCHAR(255),           -- Profile picture URL
    num_posts INT DEFAULT 0,            -- Number of posts (set default to 0)
    num_likes INT DEFAULT 0,            -- Number of likes (set default to 0)
    user_closed ENUM('yes', 'no') DEFAULT 'no',  -- Indicates if the user account is closed
    friend_array TEXT                   -- A text field to store friend array (if needed)
);
