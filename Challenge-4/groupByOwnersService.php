<?php


class GroupByOwnersService
{
public function groupFilesByOwner(array $files): array
{
$groupedFiles = [];

foreach ($files as $file => $owner) {
$groupedFiles[$owner][] = $file;
}

return $groupedFiles;
}
}

// Test
$files = [
"insurance.txt" => "Company A",
"letter.docx" => "Company A",
"Contract.docx" => "Company B"
];

$service = new GroupByOwnersService();
$groupedFiles = $service->groupFilesByOwner($files);

print_r($groupedFiles);
