# E-book Archive Feature Guide

## Overview

The archive feature allows you to safely archive e-books instead of permanently deleting them. Archived e-books can be restored at any time, providing a safety net against accidental deletions.

## Features

### 1. Archive E-books

- **Soft Delete**: E-books are marked as 'archived' in the database but not permanently deleted
- **Data Preservation**: All e-book information (title, author, file, statistics) is preserved
- **Reversible**: Archived e-books can be restored to active status at any time

### 2. Archive Management

- **Dedicated Page**: Access archived e-books at `Auth/archive_ebook`
- **Visual Indicators**: Archived e-books display a yellow "ARCHIVED" badge
- **Statistics Preserved**: Download counts and view counts remain intact

### 3. Restore Function

- **One-Click Restore**: Restore archived e-books back to active status
- **Confirmation**: System prompts for confirmation before restoring
- **Instant Availability**: Restored e-books immediately appear in the main library

### 4. Permanent Deletion

- **Two-Step Process**: E-books must be archived first, then permanently deleted
- **Final Confirmation**: System requires confirmation before permanent deletion
- **File Removal**: Permanently deleted e-books have their files removed from the server

## How to Use

### Archiving an E-book

1. **Navigate to Digital Library**

   - Go to Admin Dashboard → Digital Library

2. **Access Manage E-books**

   - Click on "Manage E-books" in the sidebar
   - Select "Delete E-book" (this will archive, not delete)

3. **Select E-book to Archive**

   - Find the e-book you want to archive
   - Click the "Archive" button
   - Confirm the action

4. **Verification**
   - System displays success message: "E-book archived successfully!"
   - E-book is removed from active library
   - E-book appears in "Archived E-books" section

### Viewing Archived E-books

1. **Navigate to Archive**

   - Go to Digital Library → Manage E-books → Archived E-books
   - Or direct URL: `http://localhost/library_system/USTP/Library_Management_System/Admin/Auth/archive_ebook`

2. **Archive Display**
   - Archived e-books shown in card layout
   - Yellow "ARCHIVED" badge on each card
   - Display shows: thumbnail, title, author, category, file info, statistics, upload date
   - Two action buttons: "Restore" and "Delete"

### Restoring an E-book

1. **Access Archived E-books**

   - Go to Manage E-books → Archived E-books

2. **Select E-book**

   - Find the e-book you want to restore
   - Click the green "Restore" button

3. **Confirm Restoration**

   - System prompts: "Are you sure you want to restore this e-book?"
   - Click OK to confirm

4. **Verification**
   - Success message: "E-book restored successfully!"
   - E-book returns to active library
   - E-book removed from archive list

### Permanently Deleting an E-book

⚠️ **WARNING**: This action cannot be undone!

1. **Archive First**

   - E-book must be archived before permanent deletion
   - Navigate to Archived E-books

2. **Select E-book**

   - Find the e-book to delete permanently
   - Click the red "Delete" button

3. **Confirm Deletion**

   - System prompts: "Are you sure you want to PERMANENTLY delete this e-book? This action cannot be undone!"
   - Click OK to confirm

4. **Result**
   - E-book record removed from database
   - E-book file removed from server
   - Success message: "E-book permanently deleted"

## Database Structure

### Status Field

The archive system uses the `status` field in the `ebooks_tbl` table:

- **'active'**: E-book is available in the library (default)
- **'archived'**: E-book is archived and hidden from main library

### SQL Schema

```sql
ALTER TABLE ebooks_tbl ADD COLUMN status VARCHAR(20) DEFAULT 'active';
```

## File Locations

### Controller Functions

- **Auth.php**: `archive_ebook()` - Displays archived e-books page
- **Post.php**:
  - `archive_ebook($ID)` - Archives an e-book
  - `restore_ebook($ID)` - Restores an archived e-book
  - `permanent_delete_ebook($ID)` - Permanently deletes an e-book

### Model Functions

- **model.php**:
  - `archive_ebook($ID, $data)` - Updates e-book status to 'archived'
  - `getArchivedEbooks()` - Retrieves all archived e-books
  - `delete_ebook($ID)` - Permanently removes e-book record

### View Files

- **archive_ebook.php**: Archive management interface
- **ebooks.php**: Main library (includes archive link)
- **add_ebook.php**: Add e-book page (includes archive link)

## Routes

### Archive Routes

```php
// View archived e-books
http://localhost/library_system/USTP/Library_Management_System/Admin/Auth/archive_ebook

// Archive an e-book
http://localhost/library_system/USTP/Library_Management_System/Admin/Post/archive_ebook/{ID}

// Restore an e-book
http://localhost/library_system/USTP/Library_Management_System/Admin/Post/restore_ebook/{ID}

// Permanently delete an e-book
http://localhost/library_system/USTP/Library_Management_System/Admin/Post/permanent_delete_ebook/{ID}
```

## Best Practices

### 1. Archive Before Delete

- Always archive e-books first instead of immediate deletion
- Review archived e-books periodically
- Only permanently delete when absolutely certain

### 2. Regular Archive Review

- Check archived e-books monthly
- Restore accidentally archived items
- Clean up old archives after confirmation

### 3. Data Safety

- Archive provides backup against mistakes
- Files remain on server until permanent deletion
- Statistics and metadata preserved

### 4. User Notifications

- System provides clear confirmation messages
- Warnings for permanent deletion actions
- Success messages for all operations

## Troubleshooting

### Issue: Archive link not appearing

**Solution**: Clear browser cache and refresh the page

### Issue: Archived e-book still shows in main library

**Solution**:

1. Check database - verify status is 'archived'
2. Clear application cache
3. Check model function `getEbooks()` has WHERE status='active' condition

### Issue: Restore not working

**Solution**:

1. Check Post controller `restore_ebook()` function
2. Verify database permissions
3. Check session flashdata for error messages

### Issue: Permanent delete leaves files on server

**Solution**:

1. Check `delete_ebook()` model function
2. Verify file path is correct
3. Check server permissions for file deletion

## Additional Notes

- **Statistics**: Download and view counts are preserved when archiving
- **File Storage**: E-book files remain in `assets/ebooks/` folder until permanent deletion
- **Thumbnails**: Thumbnail images remain in `assets/image/uploads/ebook_thumbnails/` folder
- **Search**: Archived e-books do not appear in search results
- **Backup**: Consider backing up archived e-books before permanent deletion

## Future Enhancements

Potential improvements to consider:

- Bulk archive/restore operations
- Archive date tracking
- Auto-archive after certain period
- Archive export functionality
- Archive statistics report
- Trash bin with auto-cleanup after 30 days

## Support

For issues or questions:

1. Check this guide first
2. Review database structure
3. Check controller and model functions
4. Verify file permissions
5. Check PHP error logs in `application/logs/`

---

**Last Updated**: January 2025
**Version**: 1.0
**System**: USTP Library Management System - Digital Library Module
