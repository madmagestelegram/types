<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#passportelementerrorfiles
 *
 * Represents an issue with a list of scans. The error is considered resolved when the list of files containing the scans 
 * changes. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class PassportElementErrorFiles extends AbstractPassportElementError
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'source',
            'type',
            'file_hashes',
            'message',
        ];
    }

    /**
     * Returns associative array of raw data
     *
     * @return array
     */
    public function _getRawData(): array
    {
        $result = [
            'source' => $this->getSource(),
            'type' => $this->getType(),
            'file_hashes' => $this->getFileHashes(),
            'message' => $this->getMessage(),
        ];

        $result = array_filter($result, static function($item){ return $item!==null; });
        return array_map(static function(&$item){
            return is_object($item) ? $item->_getRawData():$item;
        }, $result);
    }

    /**
     * Error source, must be files
     *
     * @var string
     * @SerializedName("source")
     * @Accessor(getter="getSource",setter="setsource")
     * @Type("string")
     */
    protected $source;

    /**
     * The section of the user&#039;s Telegram Passport which has the issue, one of “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration”, “temporary_registration”
     *
     * @var string
     * @SerializedName("type")
     * @Accessor(getter="getType",setter="settype")
     * @Type("string")
     */
    protected $type;

    /**
     * List of base64-encoded file hashes
     *
     * @var string[]
     * @SerializedName("file_hashes")
     * @Accessor(getter="getFileHashes",setter="setfileHashes")
     * @Type("array<string>")
     */
    protected $fileHashes;

    /**
     * Error message
     *
     * @var string
     * @SerializedName("message")
     * @Accessor(getter="getMessage",setter="setmessage")
     * @Type("string")
     */
    protected $message;


    /**
     * @param string $source
     * @return static
     */
    public function setSource(string $source): self
    {
        $this->source = $source;

        return $this;
    }

    /**
     * @return string
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * @param string $type
     * @return static
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string[] $fileHashes
     * @return static
     */
    public function setFileHashes(array $fileHashes): self
    {
        $this->fileHashes = $fileHashes;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getFileHashes(): array
    {
        return $this->fileHashes;
    }

    /**
     * @param string $message
     * @return static
     */
    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

}