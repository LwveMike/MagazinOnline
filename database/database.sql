-- Crearea tabelelor

CREATE TABLE products (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100) NOT NULL,
url TEXT NOT NULL,
brand VARCHAR(100) NOT NULL,
description TEXT DEFAULT 'Lorem ipsum dolor sit amet
                    consectetur adipisicing elit. Ad officia necessitatibus
                    voluptatum autem aliquid aspernatur.',
price FLOAT NOT NULL,
category VARCHAR(255) NOT NULL,
sub_category VARCHAR(255) NOT NULL
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(60) UNIQUE NOT NULL,
    password VARCHAR(256) NOT NULL,
    role VARCHAR(60) DEFAULT 'normal'
);

CREATE TABLE cart_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    FOREIGN KEY (user_id) 
        REFERENCES users(id) 
        ON DELETE CASCADE,

    product_id INT,
    FOREIGN KEY (product_id) 
        REFERENCES products(id)
        ON DELETE CASCADE,

    quantity INT NOT NULL
    
);

-- CREATE TABLE cart (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     user_id INT,
--     cart_item_id INT,
--      FOREIGN KEY (user_id) 
--         REFERENCES users(id) 
--         ON DELETE CASCADE,
    
--     FOREIGN KEY (cart_item_id) 
--         REFERENCES cart_items(id) 
--         ON DELETE CASCADE
-- );



-- Inseram niste produse

INSERT INTO products (name, url, brand, price, category, sub_category)
VALUES ('Jacketa SoA','https://www.marveljacket.com/wp-content/uploads/2020/10/cf7c5023f726db75813fa762cea41229-1.jpg', 'SoA',420.69, 'men', 'jackets'),
       ('Scurta de iarna', 'https://staff-clothes.md/image/cache/catalog/DSS0101/f8cfd5e5ef6a4fdc828740a9d4e45562-700x922.jpeg', 'Linella',30, 'women', 'winter'),
       ('Sandale', 'https://belenka.bwcdn.net/media/2020/05/2/1/barefoot-sandale-be-lenka-grace-gold-2072-size-large-v-1.jpg', 'Boss',1400, 'women', 'boots');

-- Legam produsele de cart items

INSERT INTO cart_items (user_id, product_id, quantity)
VALUES (1, 1, 1),
       (1, 2, 3);

    

