<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#inputmediaaudio
 *
 * Represents an audio file to be treated as music to be sent. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class InputMediaAudio extends AbstractInputMedia
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'type',
            'media',
            'thumb',
            'caption',
            'parse_mode',
            'duration',
            'performer',
            'title',
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
            'type' => $this->getType(),
            'media' => $this->getMedia(),
            'thumb' => $this->getThumb(),
            'caption' => $this->getCaption(),
            'parse_mode' => $this->getParseMode(),
            'duration' => $this->getDuration(),
            'performer' => $this->getPerformer(),
            'title' => $this->getTitle(),
        ];

        $result = array_filter($result, static function($item){ return $item!==null; });
        return array_map(static function(&$item){
            return is_object($item) ? $item->_getRawData():$item;
        }, $result);
    }

    /**
     * Type of the result, must be audio
     *
     * @var string
     * @SerializedName("type")
     * @Accessor(getter="getType",setter="settype")
     * @Type("string")
     */
    protected $type;

    /**
     * File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass “attach://” to upload a new one using multipart/form-data under  name. More info on Sending Files »
     *
     * @var string
     * @SerializedName("media")
     * @Accessor(getter="getMedia",setter="setmedia")
     * @Type("string")
     */
    protected $media;

    /**
     * Optional. Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail‘s width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can’t be reused and can be only uploaded as a new file, so you can pass “attach://” if the thumbnail was uploaded using multipart/form-data under . More info on Sending Files »
     *
     * @var AbstractInputFile|string|null
     * @SkipWhenEmpty
     * @SerializedName("thumb")
     * @Accessor(getter="getThumb",setter="setthumb")
     * @Type("string")
     */
    protected $thumb;

    /**
     * Optional. Caption of the audio to be sent, 0-1024 characters
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("caption")
     * @Accessor(getter="getCaption",setter="setcaption")
     * @Type("string")
     */
    protected $caption;

    /**
     * Optional. Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in the media caption.
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("parse_mode")
     * @Accessor(getter="getParseMode",setter="setparseMode")
     * @Type("string")
     */
    protected $parseMode;

    /**
     * Optional. Duration of the audio in seconds
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("duration")
     * @Accessor(getter="getDuration",setter="setduration")
     * @Type("int")
     */
    protected $duration;

    /**
     * Optional. Performer of the audio
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("performer")
     * @Accessor(getter="getPerformer",setter="setperformer")
     * @Type("string")
     */
    protected $performer;

    /**
     * Optional. Title of the audio
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("title")
     * @Accessor(getter="getTitle",setter="settitle")
     * @Type("string")
     */
    protected $title;


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
     * @param string $media
     * @return static
     */
    public function setMedia(string $media): self
    {
        $this->media = $media;

        return $this;
    }

    /**
     * @return string
     */
    public function getMedia(): string
    {
        return $this->media;
    }

    /**
     * @param AbstractInputFile|string $thumb
     * @return static
     */
    public function setThumb( $thumb): self
    {
        $this->thumb = $thumb;

        return $this;
    }

    /**
     * @return AbstractInputFile|string|null
     */
    public function getThumb()
    {
        return $this->thumb;
    }

    /**
     * @param string $caption
     * @return static
     */
    public function setCaption(string $caption): self
    {
        $this->caption = $caption;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCaption(): ?string
    {
        return $this->caption;
    }

    /**
     * @param string $parseMode
     * @return static
     */
    public function setParseMode(string $parseMode): self
    {
        $this->parseMode = $parseMode;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getParseMode(): ?string
    {
        return $this->parseMode;
    }

    /**
     * @param int $duration
     * @return static
     */
    public function setDuration(int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getDuration(): ?int
    {
        return $this->duration;
    }

    /**
     * @param string $performer
     * @return static
     */
    public function setPerformer(string $performer): self
    {
        $this->performer = $performer;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPerformer(): ?string
    {
        return $this->performer;
    }

    /**
     * @param string $title
     * @return static
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

}