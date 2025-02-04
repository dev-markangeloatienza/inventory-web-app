A **basic database schema** for an **Inventory System** includes essential tables for managing products, stock levels, suppliers, sales, and purchases. Below is a **simplified schema** with key tables and relationships:

---

## **1. `users` (For Admins & Employees)**

Stores user accounts for system access.

| Column       | Type         | Description            |
| ------------ | ------------ | ---------------------- |
| `id`         | BIGINT (PK)  | Unique user ID         |
| `name`       | VARCHAR(255) | User’s full name       |
| `email`      | VARCHAR(255) | Unique email for login |
| `password`   | VARCHAR(255) | Hashed password        |
| `role`       | ENUM         | (`admin`, `employee`)  |
| `created_at` | TIMESTAMP    | Date user was added    |
| `updated_at` | TIMESTAMP    | Last update time       |

---

## **2. `categories` (For Product Categorization)**

Groups products into categories.

| Column       | Type         | Description                                  |
| ------------ | ------------ | -------------------------------------------- |
| `id`         | BIGINT (PK)  | Unique category ID                           |
| `name`       | VARCHAR(255) | Category name (e.g., Electronics, Groceries) |
| `created_at` | TIMESTAMP    | Date category was created                    |

---

## **3. `products` (For Inventory Items)**

Stores product details.

| Column          | Type          | Description                      |
| --------------- | ------------- | -------------------------------- |
| `id`            | BIGINT (PK)   | Unique product ID                |
| `name`          | VARCHAR(255)  | Product name                     |
| `category_id`   | BIGINT (FK)   | References `categories.id`       |
| `supplier_id`   | BIGINT (FK)   | References `suppliers.id`        |
| `sku`           | VARCHAR(50)   | Stock Keeping Unit (Unique Code) |
| `price`         | DECIMAL(10,2) | Selling price                    |
| `price`         | DECIMAL(10,2) | Cost price                       |
| `stock`         | INT           | Available stock quantity         |
| `reorder_level` | INT           | Minimum stock before restocking  |
| `created_at`    | TIMESTAMP     | Date product was added           |
| `updated_at`    | TIMESTAMP     | Last update time                 |

---

## **4. `suppliers` (For Vendors)**

Stores information about product suppliers.

| Column       | Type         | Description             |
| ------------ | ------------ | ----------------------- |
| `id`         | BIGINT (PK)  | Unique supplier ID      |
| `name`       | VARCHAR(255) | Supplier name           |
| `contact`    | VARCHAR(255) | Contact details         |
| `email`      | VARCHAR(255) | Supplier email          |
| `address`    | TEXT         | Supplier address        |
| `created_at` | TIMESTAMP    | Date supplier was added |

---

## **5. `purchases` (For Stock Inflow)**

Records purchases from suppliers.

| Column          | Type          | Description                |
| --------------- | ------------- | -------------------------- |
| `id`            | BIGINT (PK)   | Unique purchase ID         |
| `supplier_id`   | BIGINT (FK)   | References `suppliers.id`  |
| `total_cost`    | DECIMAL(10,2) | Total cost of the purchase |
| `purchase_date` | TIMESTAMP     | Date of purchase           |
| `created_at`    | TIMESTAMP     | Date purchase was recorded |

### **6. `purchase_items` (Link Purchases to Products)**

Tracks which products were purchased.

| Column        | Type          | Description               |
| ------------- | ------------- | ------------------------- |
| `id`          | BIGINT (PK)   | Unique ID                 |
| `purchase_id` | BIGINT (FK)   | References `purchases.id` |
| `product_id`  | BIGINT (FK)   | References `products.id`  |
| `quantity`    | INT           | Quantity purchased        |
| `cost_price`  | DECIMAL(10,2) | Cost per unit             |

---

## **7. `sales` (For Stock Outflow)**

Records sales transactions.

| Column        | Type          | Description                     |
| ------------- | ------------- | ------------------------------- |
| `id`          | BIGINT (PK)   | Unique sale ID                  |
| `user_id`     | BIGINT (FK)   | References `users.id` (Cashier) |
| `total_price` | DECIMAL(10,2) | Total sale price                |
| `sale_date`   | TIMESTAMP     | Date of sale                    |
| `created_at`  | TIMESTAMP     | Date sale was recorded          |

### **8. `sale_items` (Tracks Products Sold in Sales)**

Links sales to specific products.

| Column       | Type          | Description              |
| ------------ | ------------- | ------------------------ |
| `id`         | BIGINT (PK)   | Unique ID                |
| `sale_id`    | BIGINT (FK)   | References `sales.id`    |
| `product_id` | BIGINT (FK)   | References `products.id` |
| `quantity`   | INT           | Quantity sold            |
| `price`      | DECIMAL(10,2) | Selling price per unit   |

---

## **9. `inventory_logs` (For Tracking Stock Changes)**

Records stock movements (adjustments, returns, etc.).

| Column        | Type        | Description                                 |
| ------------- | ----------- | ------------------------------------------- |
| `id`          | BIGINT (PK) | Unique log ID                               |
| `product_id`  | BIGINT (FK) | References `products.id`                    |
| `user_id`     | BIGINT (FK) | References `users.id` (Who made the change) |
| `change_type` | ENUM        | (`added`, `sold`, `adjusted`)               |
| `quantity`    | INT         | Amount of stock changed                     |
| `created_at`  | TIMESTAMP   | Date of change                              |

---

## **Relationships Between Tables**

1. `products` belongs to `categories` and `suppliers`.
2. `purchases` belong to `suppliers`.
3. `purchase_items` link `purchases` to `products`.
4. `sales` belong to `users` (cashiers/employees).
5. `sale_items` link `sales` to `products`.
6. `inventory_logs` track stock changes.

---

### **Additional Features**

- **Stock Alerts:** Trigger an alert when stock goes below the `reorder_level`.
- **Reports:** Generate reports on sales, stock movement, and purchases.
- **User Roles:** Admins manage everything; Employees only handle sales.

Would you like a **Laravel migration script** for this schema? Let me know! 🚀
