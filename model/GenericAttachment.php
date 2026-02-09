<?php

class GenericAttachment extends Attachment implements JsonSerializable {

    protected const PATH = 'media/attachments/';

    protected const MIME_TYPES = [
        'image/jpeg'                                                              => 'jpg',
        'image/png'                                                               => 'png',
        'application/pdf'                                                         => 'pdf',
        'text/plain'                                                              => 'txt',
        'text/csv'                                                                => 'csv',
        'application/msword'                                                      => 'doc',
        'application/vnd.ms-excel'                                                => 'xls',
        'application/rtf'                                                         => 'rtf',
        'video/x-msvideo'                                                         => 'avi',
        'video/mpeg'                                                              => 'mpeg',
        'application/zip'                                                         => 'zip',
        'text/xml'                                                                => 'xml',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => 'docx'
    ];

}