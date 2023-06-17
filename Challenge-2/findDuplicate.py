def findDuplicates(arr):
    seen = set()
    duplicates = set()

    for num in arr:
        if num in seen:
            duplicates.add(num)
        else:
            seen.add(num)

    return list(duplicates)


# Example usage
arr = [2, 3, 1, 2, 3]
duplicates = findDuplicates(arr)
print(duplicates)
