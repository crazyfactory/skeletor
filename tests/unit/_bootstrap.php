<?php
// Here you can initialize variables that will be available to your tests
class Input implements \Symfony\Component\Console\Input\InputInterface {

	/**
	 * Returns the first argument from the raw parameters (not parsed).
	 *
	 * @return string The value of the first argument or null otherwise
	 */
	public function getFirstArgument()
	{
		return "absolutely";
	}

	/**
	 * Returns true if the raw parameters (not parsed) contain a value.
	 *
	 * This method is to be used to introspect the input parameters
	 * before they have been validated. It must be used carefully.
	 *
	 * @param string|array $values The values to look for in the raw parameters (can be an array)
	 * @param bool $onlyParams Only check real parameters, skip those following an end of options (--) signal
	 *
	 * @return bool true if the value is contained in the raw parameters
	 */
	public function hasParameterOption($values, $onlyParams = false)
	{
		false;
	}

	/**
	 * Returns the value of a raw option (not parsed).
	 *
	 * This method is to be used to introspect the input parameters
	 * before they have been validated. It must be used carefully.
	 *
	 * @param string|array $values The value(s) to look for in the raw parameters (can be an array)
	 * @param mixed $default The default value to return if no result is found
	 * @param bool $onlyParams Only check real parameters, skip those following an end of options (--) signal
	 *
	 * @return mixed The option value
	 */
	public function getParameterOption($values, $default = false, $onlyParams = false)
	{
		return false;
	}

	/**
	 * Binds the current Input instance with the given arguments and options.
	 *
	 * @param \Symfony\Component\Console\Input\InputDefinition $definition A InputDefinition instance
	 */
	public function bind(\Symfony\Component\Console\Input\InputDefinition $definition)
	{
		// TODO: Implement bind() method.
	}

	/**
	 * Validates the input.
	 *
	 * @throws \Symfony\Component\Console\Exception\RuntimeException When not enough arguments are given
	 */
	public function validate()
	{
		// TODO: Implement validate() method.
	}

	/**
	 * Returns all the given arguments merged with the default values.
	 *
	 * @return array
	 */
	public function getArguments()
	{
		// TODO: Implement getArguments() method.
	}

	/**
	 * Returns the argument value for a given argument name.
	 *
	 * @param string $name The argument name
	 *
	 * @return mixed The argument value
	 *
	 * @throws \Symfony\Component\Console\Exception\InvalidArgumentException When argument given doesn't exist
	 */
	public function getArgument($name)
	{
		// TODO: Implement getArgument() method.
	}

	/**
	 * Sets an argument value by name.
	 *
	 * @param string $name The argument name
	 * @param string $value The argument value
	 *
	 * @throws \Symfony\Component\Console\Exception\InvalidArgumentException When argument given doesn't exist
	 */
	public function setArgument($name, $value)
	{
		// TODO: Implement setArgument() method.
	}

	/**
	 * Returns true if an InputArgument object exists by name or position.
	 *
	 * @param string|int $name The InputArgument name or position
	 *
	 * @return bool true if the InputArgument object exists, false otherwise
	 */
	public function hasArgument($name)
	{
		// TODO: Implement hasArgument() method.
	}

	/**
	 * Returns all the given options merged with the default values.
	 *
	 * @return array
	 */
	public function getOptions()
	{
		// TODO: Implement getOptions() method.
	}

	/**
	 * Returns the option value for a given option name.
	 *
	 * @param string $name The option name
	 *
	 * @return mixed The option value
	 *
	 * @throws \Symfony\Component\Console\Exception\InvalidArgumentException When option given doesn't exist
	 */
	public function getOption($name)
	{
		// TODO: Implement getOption() method.
	}

	/**
	 * Sets an option value by name.
	 *
	 * @param string $name The option name
	 * @param string|bool $value The option value
	 *
	 * @throws \Symfony\Component\Console\Exception\InvalidArgumentException When option given doesn't exist
	 */
	public function setOption($name, $value)
	{
		// TODO: Implement setOption() method.
	}

	/**
	 * Returns true if an InputOption object exists by name.
	 *
	 * @param string $name The InputOption name
	 *
	 * @return bool true if the InputOption object exists, false otherwise
	 */
	public function hasOption($name)
	{
		// TODO: Implement hasOption() method.
	}

	/**
	 * Is this input means interactive?
	 *
	 * @return bool
	 */
	public function isInteractive()
	{
		// TODO: Implement isInteractive() method.
	}

	/**
	 * Sets the input interactivity.
	 *
	 * @param bool $interactive If the input should be interactive
	 */
	public function setInteractive($interactive)
	{
		// TODO: Implement setInteractive() method.
	}
}
class Output implements \Symfony\Component\Console\Output\OutputInterface {

	/**
	 * Writes a message to the output.
	 *
	 * @param string|array $messages The message as an array of lines or a single string
	 * @param bool $newline Whether to add a newline
	 * @param int $options A bitmask of options (one of the OUTPUT or VERBOSITY constants), 0 is considered the same as self::OUTPUT_NORMAL | self::VERBOSITY_NORMAL
	 */
	public function write($messages, $newline = false, $options = 0)
	{
		echo $messages;
	}

	/**
	 * Writes a message to the output and adds a newline at the end.
	 *
	 * @param string|array $messages The message as an array of lines of a single string
	 * @param int $options A bitmask of options (one of the OUTPUT or VERBOSITY constants), 0 is considered the same as self::OUTPUT_NORMAL | self::VERBOSITY_NORMAL
	 */
	public function writeln($messages, $options = 0)
	{
		echo $messages."\n";
	}

	/**
	 * Sets the verbosity of the output.
	 *
	 * @param int $level The level of verbosity (one of the VERBOSITY constants)
	 */
	public function setVerbosity($level)
	{

	}

	/**
	 * Gets the current verbosity of the output.
	 *
	 * @return int The current level of verbosity (one of the VERBOSITY constants)
	 */
	public function getVerbosity()
	{
		return 1;
	}

	/**
	 * Returns whether verbosity is quiet (-q).
	 *
	 * @return bool true if verbosity is set to VERBOSITY_QUIET, false otherwise
	 */
	public function isQuiet()
	{
		// TODO: Implement isQuiet() method.
	}

	/**
	 * Returns whether verbosity is verbose (-v).
	 *
	 * @return bool true if verbosity is set to VERBOSITY_VERBOSE, false otherwise
	 */
	public function isVerbose()
	{
		// TODO: Implement isVerbose() method.
	}

	/**
	 * Returns whether verbosity is very verbose (-vv).
	 *
	 * @return bool true if verbosity is set to VERBOSITY_VERY_VERBOSE, false otherwise
	 */
	public function isVeryVerbose()
	{
		// TODO: Implement isVeryVerbose() method.
	}

	/**
	 * Returns whether verbosity is debug (-vvv).
	 *
	 * @return bool true if verbosity is set to VERBOSITY_DEBUG, false otherwise
	 */
	public function isDebug()
	{
		// TODO: Implement isDebug() method.
	}

	/**
	 * Sets the decorated flag.
	 *
	 * @param bool $decorated Whether to decorate the messages
	 */
	public function setDecorated($decorated)
	{
		// TODO: Implement setDecorated() method.
	}

	/**
	 * Gets the decorated flag.
	 *
	 * @return bool true if the output will decorate messages, false otherwise
	 */
	public function isDecorated()
	{
		// TODO: Implement isDecorated() method.
	}

	/**
	 * Sets output formatter.
	 *
	 * @param \Symfony\Component\Console\Formatter\OutputFormatterInterface $formatter
	 */
	public function setFormatter(\Symfony\Component\Console\Formatter\OutputFormatterInterface $formatter)
	{
		// TODO: Implement setFormatter() method.
	}

	/**
	 * Returns current output formatter instance.
	 *
	 * @return \Symfony\Component\Console\Formatter\OutputFormatterInterface
	 */
	public function getFormatter()
	{
		// TODO: Implement getFormatter() method.
	}
}