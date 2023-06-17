<?php
use PHPUnit\Framework\TestCase;

class GroupByOwnersServiceTest extends TestCase
{
    /** @test */
    public function it_groups_files_by_owner()
    {
        $service = new GroupByOwnersService();

        $files = [
            "insurance.txt" => "Company A",
            "letter.docx" => "Company A",
            "Contract.docx" => "Company B"
        ];

        $expectedGroupedFiles = [
            "Company A" => ["insurance.txt", "letter.docx"],
            "Company B" => ["Contract.docx"]
        ];

        $groupedFiles = $service->groupFilesByOwner($files);

        $this->assertEquals($expectedGroupedFiles, $groupedFiles);
    }
}
